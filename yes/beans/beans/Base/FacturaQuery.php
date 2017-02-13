<?php

namespace beans\beans\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use beans\beans\Factura as ChildFactura;
use beans\beans\FacturaQuery as ChildFacturaQuery;
use beans\beans\Map\FacturaTableMap;

/**
 * Base class that represents a query for the 'factura' table.
 *
 *
 *
 * @method     ChildFacturaQuery orderByIdfactura($order = Criteria::ASC) Order by the idfactura column
 * @method     ChildFacturaQuery orderByRfc($order = Criteria::ASC) Order by the rfc column
 * @method     ChildFacturaQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildFacturaQuery orderByApellidopaterno($order = Criteria::ASC) Order by the apellidoPaterno column
 * @method     ChildFacturaQuery orderByApellidomaterno($order = Criteria::ASC) Order by the apellidoMaterno column
 * @method     ChildFacturaQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildFacturaQuery orderByNocuenta($order = Criteria::ASC) Order by the noCuenta column
 * @method     ChildFacturaQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 * @method     ChildFacturaQuery orderByDireccionIddireccion($order = Criteria::ASC) Order by the Direccion_idDireccion column
 *
 * @method     ChildFacturaQuery groupByIdfactura() Group by the idfactura column
 * @method     ChildFacturaQuery groupByRfc() Group by the rfc column
 * @method     ChildFacturaQuery groupByNombre() Group by the nombre column
 * @method     ChildFacturaQuery groupByApellidopaterno() Group by the apellidoPaterno column
 * @method     ChildFacturaQuery groupByApellidomaterno() Group by the apellidoMaterno column
 * @method     ChildFacturaQuery groupByEmail() Group by the email column
 * @method     ChildFacturaQuery groupByNocuenta() Group by the noCuenta column
 * @method     ChildFacturaQuery groupByTelefono() Group by the telefono column
 * @method     ChildFacturaQuery groupByDireccionIddireccion() Group by the Direccion_idDireccion column
 *
 * @method     ChildFacturaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFacturaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFacturaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFacturaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFacturaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFacturaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFacturaQuery leftJoinDireccion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Direccion relation
 * @method     ChildFacturaQuery rightJoinDireccion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Direccion relation
 * @method     ChildFacturaQuery innerJoinDireccion($relationAlias = null) Adds a INNER JOIN clause to the query using the Direccion relation
 *
 * @method     ChildFacturaQuery joinWithDireccion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Direccion relation
 *
 * @method     ChildFacturaQuery leftJoinWithDireccion() Adds a LEFT JOIN clause and with to the query using the Direccion relation
 * @method     ChildFacturaQuery rightJoinWithDireccion() Adds a RIGHT JOIN clause and with to the query using the Direccion relation
 * @method     ChildFacturaQuery innerJoinWithDireccion() Adds a INNER JOIN clause and with to the query using the Direccion relation
 *
 * @method     ChildFacturaQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     ChildFacturaQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     ChildFacturaQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     ChildFacturaQuery joinWithCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cliente relation
 *
 * @method     ChildFacturaQuery leftJoinWithCliente() Adds a LEFT JOIN clause and with to the query using the Cliente relation
 * @method     ChildFacturaQuery rightJoinWithCliente() Adds a RIGHT JOIN clause and with to the query using the Cliente relation
 * @method     ChildFacturaQuery innerJoinWithCliente() Adds a INNER JOIN clause and with to the query using the Cliente relation
 *
 * @method     \beans\beans\DireccionQuery|\beans\beans\ClienteQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFactura findOne(ConnectionInterface $con = null) Return the first ChildFactura matching the query
 * @method     ChildFactura findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFactura matching the query, or a new ChildFactura object populated from the query conditions when no match is found
 *
 * @method     ChildFactura findOneByIdfactura(int $idfactura) Return the first ChildFactura filtered by the idfactura column
 * @method     ChildFactura findOneByRfc(string $rfc) Return the first ChildFactura filtered by the rfc column
 * @method     ChildFactura findOneByNombre(string $nombre) Return the first ChildFactura filtered by the nombre column
 * @method     ChildFactura findOneByApellidopaterno(string $apellidoPaterno) Return the first ChildFactura filtered by the apellidoPaterno column
 * @method     ChildFactura findOneByApellidomaterno(string $apellidoMaterno) Return the first ChildFactura filtered by the apellidoMaterno column
 * @method     ChildFactura findOneByEmail(string $email) Return the first ChildFactura filtered by the email column
 * @method     ChildFactura findOneByNocuenta(string $noCuenta) Return the first ChildFactura filtered by the noCuenta column
 * @method     ChildFactura findOneByTelefono(string $telefono) Return the first ChildFactura filtered by the telefono column
 * @method     ChildFactura findOneByDireccionIddireccion(int $Direccion_idDireccion) Return the first ChildFactura filtered by the Direccion_idDireccion column *

 * @method     ChildFactura requirePk($key, ConnectionInterface $con = null) Return the ChildFactura by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFactura requireOne(ConnectionInterface $con = null) Return the first ChildFactura matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFactura requireOneByIdfactura(int $idfactura) Return the first ChildFactura filtered by the idfactura column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFactura requireOneByRfc(string $rfc) Return the first ChildFactura filtered by the rfc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFactura requireOneByNombre(string $nombre) Return the first ChildFactura filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFactura requireOneByApellidopaterno(string $apellidoPaterno) Return the first ChildFactura filtered by the apellidoPaterno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFactura requireOneByApellidomaterno(string $apellidoMaterno) Return the first ChildFactura filtered by the apellidoMaterno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFactura requireOneByEmail(string $email) Return the first ChildFactura filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFactura requireOneByNocuenta(string $noCuenta) Return the first ChildFactura filtered by the noCuenta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFactura requireOneByTelefono(string $telefono) Return the first ChildFactura filtered by the telefono column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFactura requireOneByDireccionIddireccion(int $Direccion_idDireccion) Return the first ChildFactura filtered by the Direccion_idDireccion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFactura[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFactura objects based on current ModelCriteria
 * @method     ChildFactura[]|ObjectCollection findByIdfactura(int $idfactura) Return ChildFactura objects filtered by the idfactura column
 * @method     ChildFactura[]|ObjectCollection findByRfc(string $rfc) Return ChildFactura objects filtered by the rfc column
 * @method     ChildFactura[]|ObjectCollection findByNombre(string $nombre) Return ChildFactura objects filtered by the nombre column
 * @method     ChildFactura[]|ObjectCollection findByApellidopaterno(string $apellidoPaterno) Return ChildFactura objects filtered by the apellidoPaterno column
 * @method     ChildFactura[]|ObjectCollection findByApellidomaterno(string $apellidoMaterno) Return ChildFactura objects filtered by the apellidoMaterno column
 * @method     ChildFactura[]|ObjectCollection findByEmail(string $email) Return ChildFactura objects filtered by the email column
 * @method     ChildFactura[]|ObjectCollection findByNocuenta(string $noCuenta) Return ChildFactura objects filtered by the noCuenta column
 * @method     ChildFactura[]|ObjectCollection findByTelefono(string $telefono) Return ChildFactura objects filtered by the telefono column
 * @method     ChildFactura[]|ObjectCollection findByDireccionIddireccion(int $Direccion_idDireccion) Return ChildFactura objects filtered by the Direccion_idDireccion column
 * @method     ChildFactura[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FacturaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \beans\beans\Base\FacturaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\beans\\beans\\Factura', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFacturaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFacturaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFacturaQuery) {
            return $criteria;
        }
        $query = new ChildFacturaQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildFactura|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FacturaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FacturaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFactura A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idfactura, rfc, nombre, apellidoPaterno, apellidoMaterno, email, noCuenta, telefono, Direccion_idDireccion FROM factura WHERE idfactura = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildFactura $obj */
            $obj = new ChildFactura();
            $obj->hydrate($row);
            FacturaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildFactura|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FacturaTableMap::COL_IDFACTURA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FacturaTableMap::COL_IDFACTURA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idfactura column
     *
     * Example usage:
     * <code>
     * $query->filterByIdfactura(1234); // WHERE idfactura = 1234
     * $query->filterByIdfactura(array(12, 34)); // WHERE idfactura IN (12, 34)
     * $query->filterByIdfactura(array('min' => 12)); // WHERE idfactura > 12
     * </code>
     *
     * @param     mixed $idfactura The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByIdfactura($idfactura = null, $comparison = null)
    {
        if (is_array($idfactura)) {
            $useMinMax = false;
            if (isset($idfactura['min'])) {
                $this->addUsingAlias(FacturaTableMap::COL_IDFACTURA, $idfactura['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idfactura['max'])) {
                $this->addUsingAlias(FacturaTableMap::COL_IDFACTURA, $idfactura['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacturaTableMap::COL_IDFACTURA, $idfactura, $comparison);
    }

    /**
     * Filter the query on the rfc column
     *
     * Example usage:
     * <code>
     * $query->filterByRfc('fooValue');   // WHERE rfc = 'fooValue'
     * $query->filterByRfc('%fooValue%', Criteria::LIKE); // WHERE rfc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rfc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByRfc($rfc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rfc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacturaTableMap::COL_RFC, $rfc, $comparison);
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%', Criteria::LIKE); // WHERE nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacturaTableMap::COL_NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the apellidoPaterno column
     *
     * Example usage:
     * <code>
     * $query->filterByApellidopaterno('fooValue');   // WHERE apellidoPaterno = 'fooValue'
     * $query->filterByApellidopaterno('%fooValue%', Criteria::LIKE); // WHERE apellidoPaterno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apellidopaterno The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByApellidopaterno($apellidopaterno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apellidopaterno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacturaTableMap::COL_APELLIDOPATERNO, $apellidopaterno, $comparison);
    }

    /**
     * Filter the query on the apellidoMaterno column
     *
     * Example usage:
     * <code>
     * $query->filterByApellidomaterno('fooValue');   // WHERE apellidoMaterno = 'fooValue'
     * $query->filterByApellidomaterno('%fooValue%', Criteria::LIKE); // WHERE apellidoMaterno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apellidomaterno The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByApellidomaterno($apellidomaterno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apellidomaterno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacturaTableMap::COL_APELLIDOMATERNO, $apellidomaterno, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacturaTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the noCuenta column
     *
     * Example usage:
     * <code>
     * $query->filterByNocuenta('fooValue');   // WHERE noCuenta = 'fooValue'
     * $query->filterByNocuenta('%fooValue%', Criteria::LIKE); // WHERE noCuenta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nocuenta The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByNocuenta($nocuenta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nocuenta)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacturaTableMap::COL_NOCUENTA, $nocuenta, $comparison);
    }

    /**
     * Filter the query on the telefono column
     *
     * Example usage:
     * <code>
     * $query->filterByTelefono('fooValue');   // WHERE telefono = 'fooValue'
     * $query->filterByTelefono('%fooValue%', Criteria::LIKE); // WHERE telefono LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telefono The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByTelefono($telefono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telefono)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacturaTableMap::COL_TELEFONO, $telefono, $comparison);
    }

    /**
     * Filter the query on the Direccion_idDireccion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireccionIddireccion(1234); // WHERE Direccion_idDireccion = 1234
     * $query->filterByDireccionIddireccion(array(12, 34)); // WHERE Direccion_idDireccion IN (12, 34)
     * $query->filterByDireccionIddireccion(array('min' => 12)); // WHERE Direccion_idDireccion > 12
     * </code>
     *
     * @see       filterByDireccion()
     *
     * @param     mixed $direccionIddireccion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByDireccionIddireccion($direccionIddireccion = null, $comparison = null)
    {
        if (is_array($direccionIddireccion)) {
            $useMinMax = false;
            if (isset($direccionIddireccion['min'])) {
                $this->addUsingAlias(FacturaTableMap::COL_DIRECCION_IDDIRECCION, $direccionIddireccion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($direccionIddireccion['max'])) {
                $this->addUsingAlias(FacturaTableMap::COL_DIRECCION_IDDIRECCION, $direccionIddireccion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacturaTableMap::COL_DIRECCION_IDDIRECCION, $direccionIddireccion, $comparison);
    }

    /**
     * Filter the query by a related \beans\beans\Direccion object
     *
     * @param \beans\beans\Direccion|ObjectCollection $direccion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion, $comparison = null)
    {
        if ($direccion instanceof \beans\beans\Direccion) {
            return $this
                ->addUsingAlias(FacturaTableMap::COL_DIRECCION_IDDIRECCION, $direccion->getIddireccion(), $comparison);
        } elseif ($direccion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FacturaTableMap::COL_DIRECCION_IDDIRECCION, $direccion->toKeyValue('PrimaryKey', 'Iddireccion'), $comparison);
        } else {
            throw new PropelException('filterByDireccion() only accepts arguments of type \beans\beans\Direccion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Direccion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function joinDireccion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Direccion');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Direccion');
        }

        return $this;
    }

    /**
     * Use the Direccion relation Direccion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \beans\beans\DireccionQuery A secondary query class using the current class as primary query
     */
    public function useDireccionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDireccion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Direccion', '\beans\beans\DireccionQuery');
    }

    /**
     * Filter the query by a related \beans\beans\Cliente object
     *
     * @param \beans\beans\Cliente|ObjectCollection $cliente the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildFacturaQuery The current query, for fluid interface
     */
    public function filterByCliente($cliente, $comparison = null)
    {
        if ($cliente instanceof \beans\beans\Cliente) {
            return $this
                ->addUsingAlias(FacturaTableMap::COL_IDFACTURA, $cliente->getFacturaIdfactura(), $comparison);
        } elseif ($cliente instanceof ObjectCollection) {
            return $this
                ->useClienteQuery()
                ->filterByPrimaryKeys($cliente->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCliente() only accepts arguments of type \beans\beans\Cliente or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cliente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function joinCliente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cliente');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Cliente');
        }

        return $this;
    }

    /**
     * Use the Cliente relation Cliente object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \beans\beans\ClienteQuery A secondary query class using the current class as primary query
     */
    public function useClienteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cliente', '\beans\beans\ClienteQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFactura $factura Object to remove from the list of results
     *
     * @return $this|ChildFacturaQuery The current query, for fluid interface
     */
    public function prune($factura = null)
    {
        if ($factura) {
            $this->addUsingAlias(FacturaTableMap::COL_IDFACTURA, $factura->getIdfactura(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the factura table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FacturaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FacturaTableMap::clearInstancePool();
            FacturaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FacturaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FacturaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FacturaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FacturaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FacturaQuery
