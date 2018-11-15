<?php

/**
 * class my sql is to perform action on my sql database 
 */
class MySqlHelper
{
    /**
     * function getSQLConnection is to connect to database
     */
    public static function getSQLConnection()
    {
        echo "connected to SQL DB...\n";
        return null;
    }

    /**
     * function SQLPdfRp is to get data in pdf form 
     */
    public function SQLPdfRp($tableName, $con)
    {
        echo "SQL pdf report generated\n";
    }

     /**
     * function SQlHtmlRp is to get data in html form 
     */
    public function SQlHtmlRp($tableName, $con)
    {
        echo "SQL HTML report generated\n";
    }
}

/**
 * class Oracle is to perform action on my Oracle database 
 */
class OracleHelper
{
    /**
     * function getOracleConnection is to connect to database
     */
    public static function getOracleConnection()
    {
        echo "connected to Oracle DB...\n";
        return null;
    }
    /**
     * function oraclePdfRp is to get data in pdf form 
     */
    public function oraclePdfRp($tableName, $con)
    {
        echo "Oracle pdf report generated\n";
    }
    /**
     * function oracleHtmlRp is to get data in html form 
     */
    public function oracleHtmlRp($tableName, $con)
    {
        echo "Oracle HTML report generated\n";
    }
}


class Facade
{
    public static function generateRp($dbType, $rpType, $tableName)
    {
        $con = null;

        switch ($dbType) {
            case 'MYSQL':
                $con = MySqlHelper::getSQLConnection();
                $obj = new MySqlHelper();
                switch ($rpType) {
                    case 'pdf':
                        $obj->SQLPdfRp($tableName, $con);
                        break;
                    case 'html':
                        $obj->SQlHtmlRp($tableName, $con);
                        break;
                }
                break;
            case 'ORACLE':
                $con = OracleHelper::getSQLConnection();
                $obj = new OracleHelper();
                switch ($rpType) {
                    case 'pdf':
                        $obj->SQLPdfRp($tableName, $con);
                        break;
                    case 'html':
                        $obj->SQlHtmlRp($tableName, $con);
                        break;
                }
                break;
        }
    }
}

class FacadeTest
{
    function main()
    {
        $f = new Facade();
        $f->generateRp("MYSQL", "pdf", "abc");
    }
}
FacadeTest::main();
?>