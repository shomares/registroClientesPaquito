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
use beans\beans\Direccion as ChildDireccion;
use beans\beans\DireccionQuery as ChildDireccionQuery;
use beans\beans\Map\DireccionTableMap;

/**
 * Base class that represents a query for the 'direccion' table.
 *
 *
 *
 * @method     ChildDireccionQuery orderByIddireccion($order = Criteria::ASC) Order by the idDireccion column
 * @method     ChildDireccionQuery orderByCalle($order = Criteria::ASC) Order by the Calle column
 * @method     ChildDireccionQuery orderByColonia($order = Criteria::ASC) Order by the Colonia column
 * @method     ChildDireccionQuery orderByCp($order = Criteria::ASC) Order by the CP column
 * @method     ChildDireccionQuery orderByEstadoIdestado($order = Criteria::ASC) Order by the Estado_idEstado column
 *
 * @method     ChildDireccionQuery groupByIddireccion() Group by the idDireccion column
 * @method     ChildDireccionQuery groupByCalle() Group by the Calle column
 * @method     ChildDireccionQuery groupByColonia() Group by the Colonia column
 * @method     ChildDireccionQuery groupByCp() Group by the CP column
 * @method     ChildDireccionQuery groupByEstadoIdestado() Group by the Estado_idEstado column
 *
 * @method     ChildDireccionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDireccionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDireccionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDireccionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDireccionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDireccionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDireccionQuery leftJoinEstado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Estado relation
 * @method     ChildDireccionQuery rightJoinEstado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Estado relation
 * @method     ChildDireccionQuery innerJoinEstado($relationAlias = null) Adds a INNER JOIN clause to the query using the Estado relation
 *
 * @method     ChildDireccionQuery joinWithEstado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Estado relation
 *
 * @method     ChildDireccionQuery leftJoinWithEstado() Adds a LEFT JOIN clause and with to the query using the Estado relation
 * @method     ChildDireccionQuery rightJoinWithEstado() Adds a RIGHT JOIN clause and with to the query using the Estado relation
 * @method     ChildDireccionQuery innerJoinWithEstado() Adds a INNER JOIN clause and with to the query using the Estado relation
 *
 * @method     ChildDireccionQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     ChildDireccionQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     ChildDireccionQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     ChildDireccionQuery joinWithCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cliente relation
 *
 * @method     ChildDireccionQuery leftJoinWithCliente() Adds a LEFT JOIN clause and with to the query using the Cliente relation
 * @method     ChildDireccionQuery rightJoinWithCliente() Adds a RIGHT JOIN clause and with to the query using the Cliente relation
 * @method     ChildDireccionQuery innerJoinWithCliente() Adds a INNER JOIN clause and with to the query using the Cliente relation
 *
 * @method     ChildDireccionQuery leftJoinFactura($relationAlias = null) Adds a LEFT JOIN clause to the query using the Factura relation
 * @method     ChildDireccionQuery rightJoinFactura($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Factura relation
 * @method     ChildDireccionQuery innerJoinFactura($relationAlias = null) Adds a INNER JOIN clause to the query using the Factura relation
 *
 * @method     ChildDireccionQuery joinWithFactura($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Factura relation
 *
 * @method     ChildDireccionQuery leftJoinWithFactura() Adds a LEFT JOIN clause and with to the query using the Factura relation
 * @method     ChildDireccionQuery rightJoinWithFactura() Adds a RIGHT JOIN clause and with to the query using the Factura relation
 * @method     ChildDireccionQuery innerJoinWithFactura() Adds a INNER JOIN clause and with to the query using the Factura relation
 *
 * @method     \beans\beans\EstadoQuery|\beans\beans\ClienteQuery|\beans\beans\FacturaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDireccion findOne(ConnectionInterface $con = null) Return the first ChildDireccion matching the query
 * @method     ChildDireccion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDireccion matching the query, or a new ChildDireccion object populated from the query conditions when no match is found
 *
 * @method     ChildDireccion findOneByIddireccion(int $idDireccion) Return the first ChildDireccion filtered by the idDireccion column
 * @method     ChildDireccion findOneByCalle(string $Calle) Return the first ChildDireccion filtered by the Calle column
 * @method     ChildDireccion findOneByColonia(string $Colonia) Return the first ChildDireccion filtered by the Colonia column
 * @method     ChildDireccion findOneByCp(string $CP) Return the first ChildDireccion filtered by the CP column
 * @method     ChildDireccion findOneByEstadoIdestado(int $Estado_idEstado) Return the first ChildDireccion filtered by the Estado_idEstado column *

 * @method     ChildDireccion requirePk($key, ConnectionInterface $con = null) Return the ChildDireccion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOne(ConnectionInterface $con = null) Return the first ChildDireccion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDireccion requireOneByIddireccion(int $idDireccion) Return the first ChildDireccion filtered by the idDireccion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByCalle(string $Calle) Return the first ChildDireccion filtered by the Calle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByColonia(string $Colonia) Return the first ChildDireccion filtered by the Colonia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByCp(string $CP) Return the first ChildDireccion filtered by the CP column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByEstadoIdestado(int $Estado_idEstado) Return the first ChildDireccion filtered by the Estado_idEstado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDireccion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDireccion objects based on current ModelCriteria
 * @method     ChildDireccion[]|ObjectCollection findByIddireccion(int $idDireccion) Return ChildDireccion objects filtered by the idDireccion column
 * @method     ChildDireccion[]|ObjectCollection findByCalle(string $Calle) Return ChildDireccion objects filtered by the Calle column
 * @method     ChildDireccion[]|ObjectCollection findByColonia(string $Colonia) Return ChildDireccion objects filtered by the Colonia column
 * @method     ChildDireccion[]|ObjectCollection findByCp(string $CP) Return ChildDireccion objects filtered by the CP column
 * @method     ChildDireccion[]|ObjectCollection findByEstadoIdestado(int $Estado_idEstado) Return ChildDireccion objects filtered by the Estado_idEstado column
 * @method     ChildDireccion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DireccionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \beans\beans\Base\DireccionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\beans\\beans\\Direccion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDireccionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDireccionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDireccionQuery) {
            return $criteria;
        }
        $query = new ChildDireccionQuery();
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
     * @return ChildDireccion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DireccionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DireccionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDireccion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idDireccion, Calle, Colonia, CP, Estado_idEstado FROM direccion WHERE idDireccion = :p0';
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
            /** @var ChildDireccion $obj */
            $obj = new ChildDireccion();
            $obj->hydrate($row);
            DireccionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDireccion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DireccionTableMap::COL_IDDIRECCION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DireccionTableMap::COL_IDDIRECCION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idDireccion column
     *
     * Example usage:
     * <code>
     * $query->filterByIddireccion(1234); // WHERE idDireccion = 1234
     * $query->filterByIddireccion(array(12, 34)); // WHERE idDireccion IN (12, 34)
     * $query->filterByIddireccion(array('min' => 12)); // WHERE idDireccion > 12
     * </code>
     *
     * @param     mixed $iddireccion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByIddireccion($iddireccion = null, $comparison = null)
    {
        if (is_array($iddireccion)) {
            $useMinMax = false;
            if (isset($iddireccion['min'])) {
                $this->addUsingAlias(DireccionTableMap::COL_IDDIRECCION, $iddireccion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddireccion['max'])) {
                $this->addUsingAlias(DireccionTableMap::COL_IDDIRECCION, $iddireccion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_IDDIRECCION, $iddireccion, $comparison);
    }

    /**
     * Filter the query on the Calle column
     *
     * Example usage:
     * <code>
     * $query->filterByCalle('fooValue');   // WHERE Calle = 'fooValue'
     * $query->filterByCalle('%fooValue%', Criteria::LIKE); // WHERE Calle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $calle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByCalle($calle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($calle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_CALLE, $calle, $comparison);
    }

    /**
     * Filter the query on the Colonia column
     *
     * Example usage:
     * <code>
     * $query->filterByColonia('fooValue');   // WHERE Colonia = 'fooValue'
     * $query->filterByColonia('%fooValue%', Criteria::LIKE); // WHERE Colonia LIKE '%fooValue%'
     * </code>
     *
     * @param     string $colonia The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByColonia($colonia = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($colonia)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_COLONIA, $colonia, $comparison);
    }

    /**
     * Filter the query on the CP column
     *
     * Example usage:
     * <code>
     * $query->filterByCp('fooValue');   // WHERE CP = 'fooValue'
     * $query->filterByCp('%fooValue%', Criteria::LIKE); // WHERE CP LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByCp($cp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_CP, $cp, $comparison);
    }

    /**
     * Filter the query on the Estado_idEstado column
     *
     * Example usage:
     * <code>
     * $query->filterByEstadoIdestado(1234); // WHERE Estado_idEstado = 1234
     * $query->filterByEstadoIdestado(array(12, 34)); // WHERE Estado_idEstado IN (12, 34)
     * $query->filterByEstadoIdestado(array('min' => 12)); // WHERE Estado_idEstado > 12
     * </code>
     *
     * @see       filterByEstado()
     *
     * @param     mixed $estadoIdestado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByEstadoIdestado($estadoIdestado = null, $comparison = null)
    {
        if (is_array($estadoIdestado)) {
            $useMinMax = false;
            if (isset($estadoIdestado['min'])) {
                $this->addUsingAlias(DireccionTableMap::COL_ESTADO_IDESTADO, $estadoIdestado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estadoIdestado['max'])) {
                $this->addUsingAlias(DireccionTableMap::COL_ESTADO_IDESTADO, $estadoIdestado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_ESTADO_IDESTADO, $estadoIdestado, $comparison);
    }

    /**
     * Filter the query by a related \beans\beans\Estado object
     *
     * @param \beans\beans\Estado|ObjectCollection $estado The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByEstado($estado, $comparison = null)
    {
        if ($estado instanceof \beans\beans\Estado) {
            return $this
                ->addUsingAlias(DireccionTableMap::COL_ESTADO_IDESTADO, $estado->getIdestado(), $comparison);
        } elseif ($estado instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DireccionTableMap::COL_ESTADO_IDESTADO, $estado->toKeyValue('PrimaryKey', 'Idestado'), $comparison);
        } else {
            throw new PropelException('filterByEstado() only accepts arguments of type \beans\beans\Estado or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Estado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function joinEstado($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Estado');

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
            $this->addJoinObject($join, 'Estado');
        }

        return $this;
    }

    /**
     * Use the Estado relation Estado object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \beans\beans\EstadoQuery A secondary query class using the current class as primary query
     */
    public function useEstadoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEstado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Estado', '\beans\beans\EstadoQuery');
    }

    /**
     * Filter the query by a related \beans\beans\Cliente object
     *
     * @param \beans\beans\Cliente|ObjectCollection $cliente the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByCliente($cliente, $comparison = null)
    {
        if ($cliente instanceof \beans\beans\Cliente) {
            return $this
                ->addUsingAlias(DireccionTableMap::COL_IDDIRECCION, $cliente->getDireccionIddireccion(), $comparison);
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
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function joinCliente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useClienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cliente', '\beans\beans\ClienteQuery');
    }

    /**
     * Filter the query by a related \beans\beans\Factura object
     *
     * @param \beans\beans\Factura|ObjectCollection $factura the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByFactura($factura, $comparison = null)
    {
        if ($factura instanceof \beans\beans\Factura) {
            return $this
                ->addUsingAlias(DireccionTableMap::COL_IDDIRECCION, $factura->getDireccionIddireccion(), $comparison);
        } elseif ($factura instanceof ObjectCollection) {
            return $this
                ->useFacturaQuery()
                ->filterByPrimaryKeys($factura->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function joinFactura($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useFacturaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFactura($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Factura', '\beans\beans\FacturaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDireccion $direccion Object to remove from the list of results
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function prune($direccion = null)
    {
        if ($direccion) {
            $this->addUsingAlias(DireccionTableMap::COL_IDDIRECCION, $direccion->getIddireccion(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the direccion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DireccionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DireccionTableMap::clearInstancePool();
            DireccionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DireccionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DireccionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DireccionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DireccionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DireccionQuery
