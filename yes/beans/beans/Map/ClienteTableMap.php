<?php

namespace beans\beans\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use beans\beans\Cliente;
use beans\beans\ClienteQuery;


/**
 * This class defines the structure of the 'cliente' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ClienteTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'beans.beans.Map.ClienteTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'cliente';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\beans\\beans\\Cliente';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'beans.beans.Cliente';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the idCliente field
     */
    const COL_IDCLIENTE = 'cliente.idCliente';

    /**
     * the column name for the nombre field
     */
    const COL_NOMBRE = 'cliente.nombre';

    /**
     * the column name for the apellidoPaterno field
     */
    const COL_APELLIDOPATERNO = 'cliente.apellidoPaterno';

    /**
     * the column name for the apellidoMaterno field
     */
    const COL_APELLIDOMATERNO = 'cliente.apellidoMaterno';

    /**
     * the column name for the Direccion_idDireccion field
     */
    const COL_DIRECCION_IDDIRECCION = 'cliente.Direccion_idDireccion';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'cliente.email';

    /**
     * the column name for the telefono field
     */
    const COL_TELEFONO = 'cliente.telefono';

    /**
     * the column name for the celular field
     */
    const COL_CELULAR = 'cliente.celular';

    /**
     * the column name for the institucion field
     */
    const COL_INSTITUCION = 'cliente.institucion';

    /**
     * the column name for the tipo_idtipo field
     */
    const COL_TIPO_IDTIPO = 'cliente.tipo_idtipo';

    /**
     * the column name for the Cuestionario_idCuestionario field
     */
    const COL_CUESTIONARIO_IDCUESTIONARIO = 'cliente.Cuestionario_idCuestionario';

    /**
     * the column name for the factura_idfactura field
     */
    const COL_FACTURA_IDFACTURA = 'cliente.factura_idfactura';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Idcliente', 'Nombre', 'Apellidopaterno', 'Apellidomaterno', 'DireccionIddireccion', 'Email', 'Telefono', 'Celular', 'Institucion', 'TipoIdtipo', 'CuestionarioIdcuestionario', 'FacturaIdfactura', ),
        self::TYPE_CAMELNAME     => array('idcliente', 'nombre', 'apellidopaterno', 'apellidomaterno', 'direccionIddireccion', 'email', 'telefono', 'celular', 'institucion', 'tipoIdtipo', 'cuestionarioIdcuestionario', 'facturaIdfactura', ),
        self::TYPE_COLNAME       => array(ClienteTableMap::COL_IDCLIENTE, ClienteTableMap::COL_NOMBRE, ClienteTableMap::COL_APELLIDOPATERNO, ClienteTableMap::COL_APELLIDOMATERNO, ClienteTableMap::COL_DIRECCION_IDDIRECCION, ClienteTableMap::COL_EMAIL, ClienteTableMap::COL_TELEFONO, ClienteTableMap::COL_CELULAR, ClienteTableMap::COL_INSTITUCION, ClienteTableMap::COL_TIPO_IDTIPO, ClienteTableMap::COL_CUESTIONARIO_IDCUESTIONARIO, ClienteTableMap::COL_FACTURA_IDFACTURA, ),
        self::TYPE_FIELDNAME     => array('idCliente', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'Direccion_idDireccion', 'email', 'telefono', 'celular', 'institucion', 'tipo_idtipo', 'Cuestionario_idCuestionario', 'factura_idfactura', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Idcliente' => 0, 'Nombre' => 1, 'Apellidopaterno' => 2, 'Apellidomaterno' => 3, 'DireccionIddireccion' => 4, 'Email' => 5, 'Telefono' => 6, 'Celular' => 7, 'Institucion' => 8, 'TipoIdtipo' => 9, 'CuestionarioIdcuestionario' => 10, 'FacturaIdfactura' => 11, ),
        self::TYPE_CAMELNAME     => array('idcliente' => 0, 'nombre' => 1, 'apellidopaterno' => 2, 'apellidomaterno' => 3, 'direccionIddireccion' => 4, 'email' => 5, 'telefono' => 6, 'celular' => 7, 'institucion' => 8, 'tipoIdtipo' => 9, 'cuestionarioIdcuestionario' => 10, 'facturaIdfactura' => 11, ),
        self::TYPE_COLNAME       => array(ClienteTableMap::COL_IDCLIENTE => 0, ClienteTableMap::COL_NOMBRE => 1, ClienteTableMap::COL_APELLIDOPATERNO => 2, ClienteTableMap::COL_APELLIDOMATERNO => 3, ClienteTableMap::COL_DIRECCION_IDDIRECCION => 4, ClienteTableMap::COL_EMAIL => 5, ClienteTableMap::COL_TELEFONO => 6, ClienteTableMap::COL_CELULAR => 7, ClienteTableMap::COL_INSTITUCION => 8, ClienteTableMap::COL_TIPO_IDTIPO => 9, ClienteTableMap::COL_CUESTIONARIO_IDCUESTIONARIO => 10, ClienteTableMap::COL_FACTURA_IDFACTURA => 11, ),
        self::TYPE_FIELDNAME     => array('idCliente' => 0, 'nombre' => 1, 'apellidoPaterno' => 2, 'apellidoMaterno' => 3, 'Direccion_idDireccion' => 4, 'email' => 5, 'telefono' => 6, 'celular' => 7, 'institucion' => 8, 'tipo_idtipo' => 9, 'Cuestionario_idCuestionario' => 10, 'factura_idfactura' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('cliente');
        $this->setPhpName('Cliente');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\beans\\beans\\Cliente');
        $this->setPackage('beans.beans');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idCliente', 'Idcliente', 'INTEGER', true, null, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 45, null);
        $this->addColumn('apellidoPaterno', 'Apellidopaterno', 'VARCHAR', true, 45, null);
        $this->addColumn('apellidoMaterno', 'Apellidomaterno', 'VARCHAR', true, 45, null);
        $this->addForeignKey('Direccion_idDireccion', 'DireccionIddireccion', 'INTEGER', 'direccion', 'idDireccion', true, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 45, null);
        $this->addColumn('telefono', 'Telefono', 'VARCHAR', true, 45, null);
        $this->addColumn('celular', 'Celular', 'VARCHAR', true, 45, null);
        $this->addColumn('institucion', 'Institucion', 'VARCHAR', true, 45, null);
        $this->addForeignKey('tipo_idtipo', 'TipoIdtipo', 'INTEGER', 'tipo', 'idtipo', true, null, null);
        $this->addForeignKey('Cuestionario_idCuestionario', 'CuestionarioIdcuestionario', 'INTEGER', 'cuestionario', 'idCuestionario', true, null, null);
        $this->addForeignKey('factura_idfactura', 'FacturaIdfactura', 'INTEGER', 'factura', 'idfactura', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cuestionario', '\\beans\\beans\\Cuestionario', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Cuestionario_idCuestionario',
    1 => ':idCuestionario',
  ),
), null, null, null, false);
        $this->addRelation('Direccion', '\\beans\\beans\\Direccion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Direccion_idDireccion',
    1 => ':idDireccion',
  ),
), null, null, null, false);
        $this->addRelation('Factura', '\\beans\\beans\\Factura', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':factura_idfactura',
    1 => ':idfactura',
  ),
), null, null, null, false);
        $this->addRelation('Tipo', '\\beans\\beans\\Tipo', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':tipo_idtipo',
    1 => ':idtipo',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcliente', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcliente', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcliente', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcliente', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcliente', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcliente', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Idcliente', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ClienteTableMap::CLASS_DEFAULT : ClienteTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Cliente object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ClienteTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ClienteTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ClienteTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ClienteTableMap::OM_CLASS;
            /** @var Cliente $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ClienteTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ClienteTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ClienteTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Cliente $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ClienteTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ClienteTableMap::COL_IDCLIENTE);
            $criteria->addSelectColumn(ClienteTableMap::COL_NOMBRE);
            $criteria->addSelectColumn(ClienteTableMap::COL_APELLIDOPATERNO);
            $criteria->addSelectColumn(ClienteTableMap::COL_APELLIDOMATERNO);
            $criteria->addSelectColumn(ClienteTableMap::COL_DIRECCION_IDDIRECCION);
            $criteria->addSelectColumn(ClienteTableMap::COL_EMAIL);
            $criteria->addSelectColumn(ClienteTableMap::COL_TELEFONO);
            $criteria->addSelectColumn(ClienteTableMap::COL_CELULAR);
            $criteria->addSelectColumn(ClienteTableMap::COL_INSTITUCION);
            $criteria->addSelectColumn(ClienteTableMap::COL_TIPO_IDTIPO);
            $criteria->addSelectColumn(ClienteTableMap::COL_CUESTIONARIO_IDCUESTIONARIO);
            $criteria->addSelectColumn(ClienteTableMap::COL_FACTURA_IDFACTURA);
        } else {
            $criteria->addSelectColumn($alias . '.idCliente');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.apellidoPaterno');
            $criteria->addSelectColumn($alias . '.apellidoMaterno');
            $criteria->addSelectColumn($alias . '.Direccion_idDireccion');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.telefono');
            $criteria->addSelectColumn($alias . '.celular');
            $criteria->addSelectColumn($alias . '.institucion');
            $criteria->addSelectColumn($alias . '.tipo_idtipo');
            $criteria->addSelectColumn($alias . '.Cuestionario_idCuestionario');
            $criteria->addSelectColumn($alias . '.factura_idfactura');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ClienteTableMap::DATABASE_NAME)->getTable(ClienteTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ClienteTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ClienteTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ClienteTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Cliente or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Cliente object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \beans\beans\Cliente) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ClienteTableMap::DATABASE_NAME);
            $criteria->add(ClienteTableMap::COL_IDCLIENTE, (array) $values, Criteria::IN);
        }

        $query = ClienteQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ClienteTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ClienteTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the cliente table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ClienteQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Cliente or Criteria object.
     *
     * @param mixed               $criteria Criteria or Cliente object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Cliente object
        }

        if ($criteria->containsKey(ClienteTableMap::COL_IDCLIENTE) && $criteria->keyContainsValue(ClienteTableMap::COL_IDCLIENTE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClienteTableMap::COL_IDCLIENTE.')');
        }


        // Set the correct dbName
        $query = ClienteQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ClienteTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ClienteTableMap::buildTableMap();
