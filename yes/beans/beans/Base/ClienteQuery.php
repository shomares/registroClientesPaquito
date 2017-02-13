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
use beans\beans\Cliente as ChildCliente;
use beans\beans\ClienteQuery as ChildClienteQuery;
use beans\beans\Map\ClienteTableMap;

/**
 * Base class that represents a query for the 'cliente' table.
 *
 *
 *
 * @method     ChildClienteQuery orderByIdcliente($order = Criteria::ASC) Order by the idCliente column
 * @method     ChildClienteQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildClienteQuery orderByApellidopaterno($order = Criteria::ASC) Order by the apellidoPaterno column
 * @method     ChildClienteQuery orderByApellidomaterno($order = Criteria::ASC) Order by the apellidoMaterno column
 * @method     ChildClienteQuery orderByDireccionIddireccion($order = Criteria::ASC) Order by the Direccion_idDireccion column
 * @method     ChildClienteQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildClienteQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 * @method     ChildClienteQuery orderByCelular($order = Criteria::ASC) Order by the celular column
 * @method     ChildClienteQuery orderByInstitucion($order = Criteria::ASC) Order by the institucion column
 * @method     ChildClienteQuery orderByTipoIdtipo($order = Criteria::ASC) Order by the tipo_idtipo column
 * @method     ChildClienteQuery orderByCuestionarioIdcuestionario($order = Criteria::ASC) Order by the Cuestionario_idCuestionario column
 * @method     ChildClienteQuery orderByFacturaIdfactura($order = Criteria::ASC) Order by the factura_idfactura column
 *
 * @method     ChildClienteQuery groupByIdcliente() Group by the idCliente column
 * @method     ChildClienteQuery groupByNombre() Group by the nombre column
 * @method     ChildClienteQuery groupByApellidopaterno() Group by the apellidoPaterno column
 * @method     ChildClienteQuery groupByApellidomaterno() Group by the apellidoMaterno column
 * @method     ChildClienteQuery groupByDireccionIddireccion() Group by the Direccion_idDireccion column
 * @method     ChildClienteQuery groupByEmail() Group by the email column
 * @method     ChildClienteQuery groupByTelefono() Group by the telefono column
 * @method     ChildClienteQuery groupByCelular() Group by the celular column
 * @method     ChildClienteQuery groupByInstitucion() Group by the institucion column
 * @method     ChildClienteQuery groupByTipoIdtipo() Group by the tipo_idtipo column
 * @method     ChildClienteQuery groupByCuestionarioIdcuestionario() Group by the Cuestionario_idCuestionario column
 * @method     ChildClienteQuery groupByFacturaIdfactura() Group by the factura_idfactura column
 *
 * @method     ChildClienteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildClienteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildClienteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildClienteQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildClienteQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildClienteQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildClienteQuery leftJoinCuestionario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cuestionario relation
 * @method     ChildClienteQuery rightJoinCuestionario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cuestionario relation
 * @method     ChildClienteQuery innerJoinCuestionario($relationAlias = null) Adds a INNER JOIN clause to the query using the Cuestionario relation
 *
 * @method     ChildClienteQuery joinWithCuestionario($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cuestionario relation
 *
 * @method     ChildClienteQuery leftJoinWithCuestionario() Adds a LEFT JOIN clause and with to the query using the Cuestionario relation
 * @method     ChildClienteQuery rightJoinWithCuestionario() Adds a RIGHT JOIN clause and with to the query using the Cuestionario relation
 * @method     ChildClienteQuery innerJoinWithCuestionario() Adds a INNER JOIN clause and with to the query using the Cuestionario relation
 *
 * @method     ChildClienteQuery leftJoinDireccion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Direccion relation
 * @method     ChildClienteQuery rightJoinDireccion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Direccion relation
 * @method     ChildClienteQuery innerJoinDireccion($relationAlias = null) Adds a INNER JOIN clause to the query using the Direccion relation
 *
 * @method     ChildClienteQuery joinWithDireccion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Direccion relation
 *
 * @method     ChildClienteQuery leftJoinWithDireccion() Adds a LEFT JOIN clause and with to the query using the Direccion relation
 * @method     ChildClienteQuery rightJoinWithDireccion() Adds a RIGHT JOIN clause and with to the query using the Direccion relation
 * @method     ChildClienteQuery innerJoinWithDireccion() Adds a INNER JOIN clause and with to the query using the Direccion relation
 *
 * @method     ChildClienteQuery leftJoinFactura($relationAlias = null) Adds a LEFT JOIN clause to the query using the Factura relation
 * @method     ChildClienteQuery rightJoinFactura($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Factura relation
 * @method     ChildClienteQuery innerJoinFactura($relationAlias = null) Adds a INNER JOIN clause to the query using the Factura relation
 *
 * @method     ChildClienteQuery joinWithFactura($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Factura relation
 *
 * @method     ChildClienteQuery leftJoinWithFactura() Adds a LEFT JOIN clause and with to the query using the Factura relation
 * @method     ChildClienteQuery rightJoinWithFactura() Adds a RIGHT JOIN clause and with to the query using the Factura relation
 * @method     ChildClienteQuery innerJoinWithFactura() Adds a INNER JOIN clause and with to the query using the Factura relation
 *
 * @method     ChildClienteQuery leftJoinTipo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tipo relation
 * @method     ChildClienteQuery rightJoinTipo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tipo relation
 * @method     ChildClienteQuery innerJoinTipo($relationAlias = null) Adds a INNER JOIN clause to the query using the Tipo relation
 *
 * @method     ChildClienteQuery joinWithTipo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tipo relation
 *
 * @method     ChildClienteQuery leftJoinWithTipo() Adds a LEFT JOIN clause and with to the query using the Tipo relation
 * @method     ChildClienteQuery rightJoinWithTipo() Adds a RIGHT JOIN clause and with to the query using the Tipo relation
 * @method     ChildClienteQuery innerJoinWithTipo() Adds a INNER JOIN clause and with to the query using the Tipo relation
 *
 * @method     \beans\beans\CuestionarioQuery|\beans\beans\DireccionQuery|\beans\beans\FacturaQuery|\beans\beans\TipoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCliente findOne(ConnectionInterface $con = null) Return the first ChildCliente matching the query
 * @method     ChildCliente findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCliente matching the query, or a new ChildCliente object populated from the query conditions when no match is found
 *
 * @method     ChildCliente findOneByIdcliente(int $idCliente) Return the first ChildCliente filtered by the idCliente column
 * @method     ChildCliente findOneByNombre(string $nombre) Return the first ChildCliente filtered by the nombre column
 * @method     ChildCliente findOneByApellidopaterno(string $apellidoPaterno) Return the first ChildCliente filtered by the apellidoPaterno column
 * @method     ChildCliente findOneByApellidomaterno(string $apellidoMaterno) Return the first ChildCliente filtered by the apellidoMaterno column
 * @method     ChildCliente findOneByDireccionIddireccion(int $Direccion_idDireccion) Return the first ChildCliente filtered by the Direccion_idDireccion column
 * @method     ChildCliente findOneByEmail(string $email) Return the first ChildCliente filtered by the email column
 * @method     ChildCliente findOneByTelefono(string $telefono) Return the first ChildCliente filtered by the telefono column
 * @method     ChildCliente findOneByCelular(string $celular) Return the first ChildCliente filtered by the celular column
 * @method     ChildCliente findOneByInstitucion(string $institucion) Return the first ChildCliente filtered by the institucion column
 * @method     ChildCliente findOneByTipoIdtipo(int $tipo_idtipo) Return the first ChildCliente filtered by the tipo_idtipo column
 * @method     ChildCliente findOneByCuestionarioIdcuestionario(int $Cuestionario_idCuestionario) Return the first ChildCliente filtered by the Cuestionario_idCuestionario column
 * @method     ChildCliente findOneByFacturaIdfactura(int $factura_idfactura) Return the first ChildCliente filtered by the factura_idfactura column *

 * @method     ChildCliente requirePk($key, ConnectionInterface $con = null) Return the ChildCliente by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOne(ConnectionInterface $con = null) Return the first ChildCliente matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCliente requireOneByIdcliente(int $idCliente) Return the first ChildCliente filtered by the idCliente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByNombre(string $nombre) Return the first ChildCliente filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByApellidopaterno(string $apellidoPaterno) Return the first ChildCliente filtered by the apellidoPaterno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByApellidomaterno(string $apellidoMaterno) Return the first ChildCliente filtered by the apellidoMaterno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByDireccionIddireccion(int $Direccion_idDireccion) Return the first ChildCliente filtered by the Direccion_idDireccion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByEmail(string $email) Return the first ChildCliente filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByTelefono(string $telefono) Return the first ChildCliente filtered by the telefono column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByCelular(string $celular) Return the first ChildCliente filtered by the celular column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByInstitucion(string $institucion) Return the first ChildCliente filtered by the institucion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByTipoIdtipo(int $tipo_idtipo) Return the first ChildCliente filtered by the tipo_idtipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByCuestionarioIdcuestionario(int $Cuestionario_idCuestionario) Return the first ChildCliente filtered by the Cuestionario_idCuestionario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByFacturaIdfactura(int $factura_idfactura) Return the first ChildCliente filtered by the factura_idfactura column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCliente[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCliente objects based on current ModelCriteria
 * @method     ChildCliente[]|ObjectCollection findByIdcliente(int $idCliente) Return ChildCliente objects filtered by the idCliente column
 * @method     ChildCliente[]|ObjectCollection findByNombre(string $nombre) Return ChildCliente objects filtered by the nombre column
 * @method     ChildCliente[]|ObjectCollection findByApellidopaterno(string $apellidoPaterno) Return ChildCliente objects filtered by the apellidoPaterno column
 * @method     ChildCliente[]|ObjectCollection findByApellidomaterno(string $apellidoMaterno) Return ChildCliente objects filtered by the apellidoMaterno column
 * @method     ChildCliente[]|ObjectCollection findByDireccionIddireccion(int $Direccion_idDireccion) Return ChildCliente objects filtered by the Direccion_idDireccion column
 * @method     ChildCliente[]|ObjectCollection findByEmail(string $email) Return ChildCliente objects filtered by the email column
 * @method     ChildCliente[]|ObjectCollection findByTelefono(string $telefono) Return ChildCliente objects filtered by the telefono column
 * @method     ChildCliente[]|ObjectCollection findByCelular(string $celular) Return ChildCliente objects filtered by the celular column
 * @method     ChildCliente[]|ObjectCollection findByInstitucion(string $institucion) Return ChildCliente objects filtered by the institucion column
 * @method     ChildCliente[]|ObjectCollection findByTipoIdtipo(int $tipo_idtipo) Return ChildCliente objects filtered by the tipo_idtipo column
 * @method     ChildCliente[]|ObjectCollection findByCuestionarioIdcuestionario(int $Cuestionario_idCuestionario) Return ChildCliente objects filtered by the Cuestionario_idCuestionario column
 * @method     ChildCliente[]|ObjectCollection findByFacturaIdfactura(int $factura_idfactura) Return ChildCliente objects filtered by the factura_idfactura column
 * @method     ChildCliente[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ClienteQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \beans\beans\Base\ClienteQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\beans\\beans\\Cliente', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildClienteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildClienteQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildClienteQuery) {
            return $criteria;
        }
        $query = new ChildClienteQuery();
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
     * @return ChildCliente|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ClienteTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ClienteTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCliente A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idCliente, nombre, apellidoPaterno, apellidoMaterno, Direccion_idDireccion, email, telefono, celular, institucion, tipo_idtipo, Cuestionario_idCuestionario, factura_idfactura FROM cliente WHERE idCliente = :p0';
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
            /** @var ChildCliente $obj */
            $obj = new ChildCliente();
            $obj->hydrate($row);
            ClienteTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCliente|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClienteTableMap::COL_IDCLIENTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClienteTableMap::COL_IDCLIENTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idCliente column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcliente(1234); // WHERE idCliente = 1234
     * $query->filterByIdcliente(array(12, 34)); // WHERE idCliente IN (12, 34)
     * $query->filterByIdcliente(array('min' => 12)); // WHERE idCliente > 12
     * </code>
     *
     * @param     mixed $idcliente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByIdcliente($idcliente = null, $comparison = null)
    {
        if (is_array($idcliente)) {
            $useMinMax = false;
            if (isset($idcliente['min'])) {
                $this->addUsingAlias(ClienteTableMap::COL_IDCLIENTE, $idcliente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcliente['max'])) {
                $this->addUsingAlias(ClienteTableMap::COL_IDCLIENTE, $idcliente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_IDCLIENTE, $idcliente, $comparison);
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
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_NOMBRE, $nombre, $comparison);
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
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByApellidopaterno($apellidopaterno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apellidopaterno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_APELLIDOPATERNO, $apellidopaterno, $comparison);
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
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByApellidomaterno($apellidomaterno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apellidomaterno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_APELLIDOMATERNO, $apellidomaterno, $comparison);
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
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByDireccionIddireccion($direccionIddireccion = null, $comparison = null)
    {
        if (is_array($direccionIddireccion)) {
            $useMinMax = false;
            if (isset($direccionIddireccion['min'])) {
                $this->addUsingAlias(ClienteTableMap::COL_DIRECCION_IDDIRECCION, $direccionIddireccion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($direccionIddireccion['max'])) {
                $this->addUsingAlias(ClienteTableMap::COL_DIRECCION_IDDIRECCION, $direccionIddireccion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_DIRECCION_IDDIRECCION, $direccionIddireccion, $comparison);
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
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByTelefono($telefono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telefono)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_TELEFONO, $telefono, $comparison);
    }

    /**
     * Filter the query on the celular column
     *
     * Example usage:
     * <code>
     * $query->filterByCelular('fooValue');   // WHERE celular = 'fooValue'
     * $query->filterByCelular('%fooValue%', Criteria::LIKE); // WHERE celular LIKE '%fooValue%'
     * </code>
     *
     * @param     string $celular The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByCelular($celular = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($celular)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_CELULAR, $celular, $comparison);
    }

    /**
     * Filter the query on the institucion column
     *
     * Example usage:
     * <code>
     * $query->filterByInstitucion('fooValue');   // WHERE institucion = 'fooValue'
     * $query->filterByInstitucion('%fooValue%', Criteria::LIKE); // WHERE institucion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $institucion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByInstitucion($institucion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($institucion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_INSTITUCION, $institucion, $comparison);
    }

    /**
     * Filter the query on the tipo_idtipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTipoIdtipo(1234); // WHERE tipo_idtipo = 1234
     * $query->filterByTipoIdtipo(array(12, 34)); // WHERE tipo_idtipo IN (12, 34)
     * $query->filterByTipoIdtipo(array('min' => 12)); // WHERE tipo_idtipo > 12
     * </code>
     *
     * @see       filterByTipo()
     *
     * @param     mixed $tipoIdtipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByTipoIdtipo($tipoIdtipo = null, $comparison = null)
    {
        if (is_array($tipoIdtipo)) {
            $useMinMax = false;
            if (isset($tipoIdtipo['min'])) {
                $this->addUsingAlias(ClienteTableMap::COL_TIPO_IDTIPO, $tipoIdtipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tipoIdtipo['max'])) {
                $this->addUsingAlias(ClienteTableMap::COL_TIPO_IDTIPO, $tipoIdtipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_TIPO_IDTIPO, $tipoIdtipo, $comparison);
    }

    /**
     * Filter the query on the Cuestionario_idCuestionario column
     *
     * Example usage:
     * <code>
     * $query->filterByCuestionarioIdcuestionario(1234); // WHERE Cuestionario_idCuestionario = 1234
     * $query->filterByCuestionarioIdcuestionario(array(12, 34)); // WHERE Cuestionario_idCuestionario IN (12, 34)
     * $query->filterByCuestionarioIdcuestionario(array('min' => 12)); // WHERE Cuestionario_idCuestionario > 12
     * </code>
     *
     * @see       filterByCuestionario()
     *
     * @param     mixed $cuestionarioIdcuestionario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByCuestionarioIdcuestionario($cuestionarioIdcuestionario = null, $comparison = null)
    {
        if (is_array($cuestionarioIdcuestionario)) {
            $useMinMax = false;
            if (isset($cuestionarioIdcuestionario['min'])) {
                $this->addUsingAlias(ClienteTableMap::COL_CUESTIONARIO_IDCUESTIONARIO, $cuestionarioIdcuestionario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cuestionarioIdcuestionario['max'])) {
                $this->addUsingAlias(ClienteTableMap::COL_CUESTIONARIO_IDCUESTIONARIO, $cuestionarioIdcuestionario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_CUESTIONARIO_IDCUESTIONARIO, $cuestionarioIdcuestionario, $comparison);
    }

    /**
     * Filter the query on the factura_idfactura column
     *
     * Example usage:
     * <code>
     * $query->filterByFacturaIdfactura(1234); // WHERE factura_idfactura = 1234
     * $query->filterByFacturaIdfactura(array(12, 34)); // WHERE factura_idfactura IN (12, 34)
     * $query->filterByFacturaIdfactura(array('min' => 12)); // WHERE factura_idfactura > 12
     * </code>
     *
     * @see       filterByFactura()
     *
     * @param     mixed $facturaIdfactura The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByFacturaIdfactura($facturaIdfactura = null, $comparison = null)
    {
        if (is_array($facturaIdfactura)) {
            $useMinMax = false;
            if (isset($facturaIdfactura['min'])) {
                $this->addUsingAlias(ClienteTableMap::COL_FACTURA_IDFACTURA, $facturaIdfactura['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($facturaIdfactura['max'])) {
                $this->addUsingAlias(ClienteTableMap::COL_FACTURA_IDFACTURA, $facturaIdfactura['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_FACTURA_IDFACTURA, $facturaIdfactura, $comparison);
    }

    /**
     * Filter the query by a related \beans\beans\Cuestionario object
     *
     * @param \beans\beans\Cuestionario|ObjectCollection $cuestionario The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildClienteQuery The current query, for fluid interface
     */
    public function filterByCuestionario($cuestionario, $comparison = null)
    {
        if ($cuestionario instanceof \beans\beans\Cuestionario) {
            return $this
                ->addUsingAlias(ClienteTableMap::COL_CUESTIONARIO_IDCUESTIONARIO, $cuestionario->getIdcuestionario(), $comparison);
        } elseif ($cuestionario instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClienteTableMap::COL_CUESTIONARIO_IDCUESTIONARIO, $cuestionario->toKeyValue('PrimaryKey', 'Idcuestionario'), $comparison);
        } else {
            throw new PropelException('filterByCuestionario() only accepts arguments of type \beans\beans\Cuestionario or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cuestionario relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function joinCuestionario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cuestionario');

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
            $this->addJoinObject($join, 'Cuestionario');
        }

        return $this;
    }

    /**
     * Use the Cuestionario relation Cuestionario object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \beans\beans\CuestionarioQuery A secondary query class using the current class as primary query
     */
    public function useCuestionarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCuestionario($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cuestionario', '\beans\beans\CuestionarioQuery');
    }

    /**
     * Filter the query by a related \beans\beans\Direccion object
     *
     * @param \beans\beans\Direccion|ObjectCollection $direccion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildClienteQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion, $comparison = null)
    {
        if ($direccion instanceof \beans\beans\Direccion) {
            return $this
                ->addUsingAlias(ClienteTableMap::COL_DIRECCION_IDDIRECCION, $direccion->getIddireccion(), $comparison);
        } elseif ($direccion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClienteTableMap::COL_DIRECCION_IDDIRECCION, $direccion->toKeyValue('PrimaryKey', 'Iddireccion'), $comparison);
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
     * @return $this|ChildClienteQuery The current query, for fluid interface
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
     * Filter the query by a related \beans\beans\Factura object
     *
     * @param \beans\beans\Factura|ObjectCollection $factura The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildClienteQuery The current query, for fluid interface
     */
    public function filterByFactura($factura, $comparison = null)
    {
        if ($factura instanceof \beans\beans\Factura) {
            return $this
                ->addUsingAlias(ClienteTableMap::COL_FACTURA_IDFACTURA, $factura->getIdfactura(), $comparison);
        } elseif ($factura instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClienteTableMap::COL_FACTURA_IDFACTURA, $factura->toKeyValue('PrimaryKey', 'Idfactura'), $comparison);
        } else {
            throw new PropelException('filterByFactura() only accepts arguments of type \beans\beans\Factura or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Factura relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function joinFactura($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Factura');

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
            $this->addJoinObject($join, 'Factura');
        }

        return $this;
    }

    /**
     * Use the Factura relation Factura object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \beans\beans\FacturaQuery A secondary query class using the current class as primary query
     */
    public function useFacturaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinFactura($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Factura', '\beans\beans\FacturaQuery');
    }

    /**
     * Filter the query by a related \beans\beans\Tipo object
     *
     * @param \beans\beans\Tipo|ObjectCollection $tipo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildClienteQuery The current query, for fluid interface
     */
    public function filterByTipo($tipo, $comparison = null)
    {
        if ($tipo instanceof \beans\beans\Tipo) {
            return $this
                ->addUsingAlias(ClienteTableMap::COL_TIPO_IDTIPO, $tipo->getIdtipo(), $comparison);
        } elseif ($tipo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClienteTableMap::COL_TIPO_IDTIPO, $tipo->toKeyValue('PrimaryKey', 'Idtipo'), $comparison);
        } else {
            throw new PropelException('filterByTipo() only accepts arguments of type \beans\beans\Tipo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tipo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function joinTipo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tipo');

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
            $this->addJoinObject($join, 'Tipo');
        }

        return $this;
    }

    /**
     * Use the Tipo relation Tipo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \beans\beans\TipoQuery A secondary query class using the current class as primary query
     */
    public function useTipoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTipo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tipo', '\beans\beans\TipoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCliente $cliente Object to remove from the list of results
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function prune($cliente = null)
    {
        if ($cliente) {
            $this->addUsingAlias(ClienteTableMap::COL_IDCLIENTE, $cliente->getIdcliente(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cliente table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClienteTableMap::clearInstancePool();
            ClienteTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ClienteTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ClienteTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ClienteTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ClienteQuery
