<?php
//Criado por @hackergaucho
//v0.1.0 31mai2021 adaptado a partir do bell/framework v4.0.0

return function ($db, $tableFolder) {
    system('clear');
    print 'migrando tabelas...'.PHP_EOL;
    $dropSqliteColumn=function ($tableName, $columnName, $db) {
        $columns = null;
        $options=null;
        //pega o nome das colunas da tabela antiga
        $colsRAW=$db->query("PRAGMA table_info($tableName);")->fetchAll();
        foreach ($colsRAW as $col) {
            if ($col['name'] != $columnName) {
                $columns[]=$col['name'];
                if ($col['name'] == 'id') {
                    $options[$col['name']]=[
                        "INT",
                        "AUTO_INCREMENT"
                    ];
                } else {
                    $options[$col['name']]=[
                        "TEXT"
                    ];
                }
            }
        }
        //criar tabela temporária sem a coluna a ser eliminada
        $tmpTable='tmp_'.$tableName;
        $db->create($tmpTable, $columns, $options);
        //inserir dados da tabela antiga na tabela temporária
        $values=$db->select($tableName, $columns);
        $db->insert($tmpTable, $values);
        //apagar a tabela antiga
        $db->drop($tableName);
        //renomear a tabela temporária
        $sql="ALTER TABLE `$tmpTable` RENAME TO `$tableName`;";
        $db->query($sql);
    };
    // vars
    $apagarCols=[];
    $filename=$tableFolder;
    $ignored=array('.', '..', '.svn', '.htaccess');
    $migrations=[];
    $migrationsCols=[];
    $tables=[];
    $tablesCols=[];
    $type=$db->info()['driver'];
    //validar os dados das variveis de entrada
    if (!file_exists($filename)) {
        die('folder table not found');
    }
    //transformar os dados de entrada em dados de saída
    //pegar o nome das migrations
    foreach (scandir($filename) as $key => $value) {
        if (in_array($value, $ignored)) {
            continue;
        }
        $migrations[] = $value;
    }
    //pegar o nome das tabelas existentes
    if ($type=='sqlite') {
        $sql='SELECT name FROM sqlite_master WHERE type="table" AND
        name NOT LIKE "sqlite_%";';
    } else {
        $sql='SHOW TABLES';
    }
    $arr=$db->query($sql)->fetchAll();
    if (is_array($arr)) {
        foreach ($arr as $key => $value) {
            $tables[]=array_values($value)[0];
        }
    }
    //comparar o nome das migrations com o das tabelas
    $apagarTabelas=array_diff($tables, $migrations);
    //dropar tabelas que não existem nas migrations
    foreach ($apagarTabelas as $key => $value) {
        if ($value<>'sqlite_sequence' and $db->drop($value)) {
            print 'tabela '.$value.' excluida'.PHP_EOL;
        } elseif ($value<>'sqlite_sequence') {
            print 'erro:'.PHP_EOL;
            print 'tabela = '.$value.PHP_EOL;
            var_dump($db->error());
        }
    }
    //pegar as colunas das migrations
    foreach ($migrations as $key => $value) {
        $filename=$tableFolder.'/'.$value;
        $str=file_get_contents($filename);
        $str=trim($str);
        $arr=explode(PHP_EOL, $str);
        $migrationsCols[$value]=array_values($arr);
    }
    //pegar as colunas das tabelas
    $arr=[];
    foreach ($tables as $key => $value) {
        if ($type=='sqlite') {
            $sql='PRAGMA table_info('.$value.');';
        } else {
            $sql='SHOW COLUMNS FROM `'.$value.'`;';
        }
        $arr[$value]=$db->query($sql)->fetchAll();
    }
    foreach ($arr as $key => $value) {
        foreach ($value as $keyX => $valueX) {
            if ($type=='sqlite') {
                $tablesCols[$key][]=$valueX['name'];
            } else {
                $tablesCols[$key][]=$valueX['Field'];
            }
        }
    }
    //comparar as colunas das migrations com a das tabelas
    foreach ($tablesCols as $key => $value) {
        $arr=@array_diff(
            $value,
            $migrationsCols[$key]
        );
        if ($arr) {
            $apagarCols[$key]=$arr;
        }
    }
    //dropar colunas que só existem nas tabelas
    foreach ($apagarCols as $tableName => $value) {
        foreach ($value as $keyX => $columnName) {
            if ($type=='sqlite') {
                $dropSqliteColumn($tableName, $columnName, $db);
            } else {
                $sql='ALTER TABLE ';
                $sql.='`'.$tableName.'` DROP COLUMN `'.$columnName.'`;';
                $db->query($sql);
            }
            $str='coluna "'.$columnName;
            $str.='" da tabela "'.$tableName;
            $str.='" excluida'.PHP_EOL;
            print $str;
        }
    }
    //criar tabelas que não existem
    $criarTabelas=array_diff($migrations, $tables);
    foreach ($criarTabelas as $key => $tableName) {
        if ($type=='sqlite') {
            $sql='CREATE TABLE IF NOT EXISTS `'.$tableName;
            $sql.='`(id INTEGER PRIMARY KEY AUTOINCREMENT);';
        } else {
            $sql='CREATE TABLE IF NOT EXISTS `'.$tableName;
            $sql.='`(id serial) ENGINE=INNODB;';
        }
        $db->query($sql);
    }
    //criar colunas que não existem
    foreach ($migrationsCols as $tableName => $cols) {
        foreach ($cols as $key => $columnName) {
            //alterar colunas que existem (apenas no mysql)
            if (isset($tablesCols[$tableName]) and
            in_array($columnName, $tablesCols[$tableName]) and
            $type != 'sqlite') {
                $sql='ALTER TABLE `'.$tableName.'`';
                $sql.=' CHANGE `'.$columnName.'`';
                if ($columnName == 'id') {
                    $sql.=' `'.$columnName.'` SERIAL NOT NULL;';
                } else {
                    $sql.=' `'.$columnName.'` LONGTEXT NULL;';
                }
            } else {
                $sql='';
            }
            //adicionar colunas que não existem
            if ($type=='sqlite') {
                $sql.='ALTER TABLE `'.$tableName.'` ADD ';
                if ($columnName=='id') {
                    $sql.='`'.$columnName.'` ';
                    $sql.='INTEGER PRIMARY KEY AUTOINCREMENT;';
                } else {
                    $sql.='`'.$columnName.'` ';
                    $sql.='TEXT;';
                }
            } else {
                $sql.='ALTER TABLE `'.$tableName.'` ADD ';
                if ($columnName=='id') {
                    $sql.='`'.$columnName.'` SERIAL;';
                } else {
                    $sql.='`'.$columnName.'` LONGTEXT;';//4GiB
                }
            }
            $db->query($sql);
        }
        print 'tabela "'.$tableName.'" ok'.PHP_EOL;
    }
    print 'migração concluída'.PHP_EOL;
};
