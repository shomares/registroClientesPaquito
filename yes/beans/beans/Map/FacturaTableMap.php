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
use beans\beans\Factura;
use beans\beans\FacturaQuery;


/**
 * This class defines the structure of the 'factura' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FacturaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'beans.beans.Map.FacturaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'factura';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\beans\\beans\\Factura';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'beans.beans.Factura';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the idfactura field
     */
    const COL_IDFACTURA = 'factura.idfactura';

    /**
     * the column name for the rfc field
     */
    const COL_RFC = 'factura.rfc';

    /**
     * the column name for the nombre field
     */
    const COL_NOMBRE = 'factura.nombre';

    /**
     * the column name for the apellidoPaterno field
     */
    const COL_APELLIDOPATERNO = 'factura.apellidoPaterno';

    /**
     * the column name for the apellidoMaterno field
     */
    const COL_APELLIDOMATERNO = 'factura.apellidoMaterno';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'factura.email';

    /**
     * the column name for the noCuenta field
     */
    const COL_NOCUENTA = 'factura.noCuenta';

    /**
     * the column name for the telefono field
     */
    const COL_TELEFONO = 'factura.telefono';

    /**
     * the column name for the Direccion_idDireccion field
     */
    const COL_DIRECCION_IDDIRECCION = 'factura.Direccion_idDireccion';

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
        self::TYPE_PHPNAME       => array('Idfactura', 'Rfc', 'Nombre', 'Apellidopaterno', 'Apellidomaterno', 'Email', 'Nocuenta', 'Telefono', 'DireccionIddireccion', ),
        self::TYPE_CAMELNAME     => array('idfactura', 'rfc', 'nombre', 'apellidopaterno', 'apellidomaterno', 'email', 'nocuenta', 'telefono', 'direccionIddireccion', ),
        self::TYPE_COLNAME       => array(FacturaTableMap::COL_IDFACTURA, FacturaTableMap::COL_RFC, FacturaTableMap::COL_NOMBRE, FacturaTableMap::COL_APELLIDOPATERNO, FacturaTableMap::COL_APELLIDOMATERNO, FacturaTableMap::COL_EMAIL, FacturaTableMap::COL_NOCUENTA, FacturaTableMap::COL_TELEFONO, FacturaTableMap::COL_DIRECCION_IDDIRECCION, ),
        self::TYPE_FIELDNAME     => array('idfactura', 'rfc', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'email', 'noCuenta', 'telefono', 'Direccion_idDireccion', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Idfactura' => 0, 'Rfc' => 1, 'Nombre' => 2, 'Apellidopaterno' => 3, 'Apellidomaterno' => 4, 'Email' => 5, 'Nocuenta' => 6, 'Telefono' => 7, 'DireccionIddireccion' => 8, ),
        self::TYPE_CAMELNAME     => array('idfactura' => 0, 'rfc' => 1, 'nombre' => 2, 'apellidopaterno' => 3, 'apellidomaterno' => 4, 'email' => 5, 'nocuenta' => 6, 'telefono' => 7, 'direccionIddireccion' => 8, ),
        self::TYPE_COLNAME       => array(FacturaTableMap::COL_IDFACTURA => 0, FacturaTableMap::COL_RFC => 1, FacturaTableMap::COL_NOMBRE => 2, FacturaTableMap::COL_APELLIDOPATERNO => 3, FacturaTableMap::COL_APELLIDOMATERNO => 4, FacturaTableMap::COL_EMAIL => 5, FacturaTableMap::COL_NOCUENTA => 6, FacturaTableMap::COL_TELEFONO => 7, FacturaTableMap::COL_DIRECCION_IDDIRECCION => 8, ),
        self::TYPE_FIELDNAME     => array('idfactura' => 0, 'rfc' => 1, 'nombre' => 2, 'apellidoPaterno' => 3, 'apellidoMaterno' => 4, 'email' => 5, 'noCuenta' => 6, 'telefono' => 7, 'Direccion_idDireccion' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('factura');
        $this->setPhpName('Factura');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\beans\\beans\\Factura');
        $this->setPackage('beans.beans');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idfactura', 'Idfactura', 'INTEGER', true, null, null);
        $this->addColumn('rfc', 'Rfc', 'VARCHAR', true, 45, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 45, null);
        $this->addColumn('apellidoPaterno', 'Apellidopaterno', 'VARCHAR', true, 45, null);
        $this->addColumn('apellidoMaterno', 'Apellidomaterno', 'VARCHAR', true, 45, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 45, null);
        $this->addColumn('noCuenta', 'Nocuenta', 'VARCHAR', true, 45, null);
        $this->addColumn('telefono', 'Telefono', 'VARCHAR', true, 45, null);
        $this->addForeignKey('Direccion_idDireccion', 'DireccionIddireccion', 'INTEGER', 'direccion', 'idDireccion', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Direccion', '\\beans\\beans\\Direccion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Direccion_idDireccion',
    1 => ':idDireccion',
  ),
), null, null, null, false);
        $this->addRelation('Cliente', '\\beans\\beans\\Cliente', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':factura_idfactura',
    1 => ':idfactura',
  ),
), null, null, 'Clientes', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idfactura', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idfactura', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idfactura', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idfactura', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idfactura', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idfactura', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Idfactura', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? FacturaTableMap::CLASS_DEFAULT : FacturaTableMap::OM_CLASS;
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
     * @return array           (Factura object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FacturaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FacturaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FacturaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FacturaTableMap::OM_CLASS;
            /** @var Factura $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FacturaTableMap::addInstanceToPool($obj, $key);
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
            $key = FacturaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FacturaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Factura $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FacturaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(FacturaTableMap::COL_IDFACTURA);
            $criteria->addSelectColumn(FacturaTableMap::COL_RFC);
            $criteria->addSelectColumn(FacturaTableMap::COL_NOMBRE);
            $criteria->addSelectColumn(FacturaTableMap::COL_APELLIDOPATERNO);
            $criteria->addSelectColumn(FacturaTableMap::COL_APELLIDOMATERNO);
            $criteria->addSelectColumn(FacturaTableMap::COL_EMAIL);
            $criteria->addSelectColumn(FacturaTableMap::COL_NOCUENTA);
            $criteria->addSelectColumn(FacturaTableMap::COL_TELEFONO);
            $criteria->addSelectColumn(FacturaTableMap::COL_DIRECCION_IDDIRECCION);
        } else {
            $criteria->addSelectColumn($alias . '.idfactura');
            $criteria->addSelectColumn($alias . '.rfc');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.apellidoPaterno');
            $criteria->addSelectColumn($alias . '.apellidoMaterno');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.noCuenta');
            $criteria->addSelectColumn($alias . '.telefono');
            $criteria->addSelectColumn($alias . '.Direccion_idDireccion');
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
        return Propel::getServiceContainer()->getDatabaseMap(FacturaTableMap::DATABASE_NAME)->getTable(FacturaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FacturaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FacturaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FacturaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Factura or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Factura object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(FacturaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \beans\beans\Factura) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FacturaTableMap::DATABASE_NAME);
            $criteria->add(FacturaTableMap::COL_IDFACTURA, (array) $values, Criteria::IN);
        }

        $query = FacturaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FacturaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FacturaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the factura table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FacturaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Factura or Criteria object.
     *
     * @param mixed               $criteria Criteria or Factura object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FacturaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Factura object
        }

        if ($criteria->containsKey(FacturaTableMap::COL_IDFACTURA) && $criteria->keyContainsValue(FacturaTableMap::COL_IDFACTURA) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.FacturaTableMap::COL_IDFACTURA.')');
        }


        // Set the correct dbName
        $query = FacturaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FacturaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FacturaTableMap::buildTableMap();
