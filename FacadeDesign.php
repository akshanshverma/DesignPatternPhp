<?php
class MySqlHelper
{
    public static function getSQLConnection()
    {
        echo "connected to SQL DB...\n";
        return null;
    }

    public function SQLPdfRp($tableName, $con)
    {
        echo "SQL pdf report generated\n";
    }

    public function SQlHtmlRp($tableName, $con)
    {
        echo "SQL HTML report generated\n";
    }
}
class OracleHelper
{
    public static function getOracleConnection()
    {
        echo "connected to Oracle DB...\n";
        return null;
    }

    public function oraclePdfRp($tableName, $con)
    {
        echo "Oracle pdf report generated\n";
    }

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