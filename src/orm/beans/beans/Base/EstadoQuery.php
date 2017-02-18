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
use beans\beans\Estado as ChildEstado;
use beans\beans\EstadoQuery as ChildEstadoQuery;
use beans\beans\Map\EstadoTableMap;

/**
 * Base class that represents a query for the 'estado' table.
 *
 *
 *
 * @method     ChildEstadoQuery orderByIdestado($order = Criteria::ASC) Order by the idEstado column
 * @method     ChildEstadoQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildEstadoQuery orderByPaisIdpais($order = Criteria::ASC) Order by the Pais_idPais column
 *
 * @method     ChildEstadoQuery groupByIdestado() Group by the idEstado column
 * @method     ChildEstadoQuery groupByNombre() Group by the nombre column
 * @method     ChildEstadoQuery groupByPaisIdpais() Group by the Pais_idPais column
 *
 * @method     ChildEstadoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEstadoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEstadoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEstadoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEstadoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEstadoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEstadoQuery leftJoinPais($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pais relation
 * @method     ChildEstadoQuery rightJoinPais($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pais relation
 * @method     ChildEstadoQuery innerJoinPais($relationAlias = null) Adds a INNER JOIN clause to the query using the Pais relation
 *
 * @method     ChildEstadoQuery joinWithPais($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pais relation
 *
 * @method     ChildEstadoQuery leftJoinWithPais() Adds a LEFT JOIN clause and with to the query using the Pais relation
 * @method     ChildEstadoQuery rightJoinWithPais() Adds a RIGHT JOIN clause and with to the query using the Pais relation
 * @method     ChildEstadoQuery innerJoinWithPais() Adds a INNER JOIN clause and with to the query using the Pais relation
 *
 * @method     ChildEstadoQuery leftJoinDireccion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Direccion relation
 * @method     ChildEstadoQuery rightJoinDireccion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Direccion relation
 * @method     ChildEstadoQuery innerJoinDireccion($relationAlias = null) Adds a INNER JOIN clause to the query using the Direccion relation
 *
 * @method     ChildEstadoQuery joinWithDireccion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Direccion relation
 *
 * @method     ChildEstadoQuery leftJoinWithDireccion() Adds a LEFT JOIN clause and with to the query using the Direccion relation
 * @method     ChildEstadoQuery rightJoinWithDireccion() Adds a RIGHT JOIN clause and with to the query using the Direccion relation
 * @method     ChildEstadoQuery innerJoinWithDireccion() Adds a INNER JOIN clause and with to the query using the Direccion relation
 *
 * @method     \beans\beans\PaisQuery|\beans\beans\DireccionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEstado findOne(ConnectionInterface $con = null) Return the first ChildEstado matching the query
 * @method     ChildEstado findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEstado matching the query, or a new ChildEstado object populated from the query conditions when no match is found
 *
 * @method     ChildEstado findOneByIdestado(int $idEstado) Return the first ChildEstado filtered by the idEstado column
 * @method     ChildEstado findOneByNombre(string $nombre) Return the first ChildEstado filtered by the nombre column
 * @method     ChildEstado findOneByPaisIdpais(int $Pais_idPais) Return the first ChildEstado filtered by the Pais_idPais column *

 * @method     ChildEstado requirePk($key, ConnectionInterface $con = null) Return the ChildEstado by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEstado requireOne(ConnectionInterface $con = null) Return the first ChildEstado matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEstado requireOneByIdestado(int $idEstado) Return the first ChildEstado filtered by the idEstado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEstado requireOneByNombre(string $nombre) Return the first ChildEstado filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEstado requireOneByPaisIdpais(int $Pais_idPais) Return the first ChildEstado filtered by the Pais_idPais column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEstado[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEstado objects based on current ModelCriteria
 * @method     ChildEstado[]|ObjectCollection findByIdestado(int $idEstado) Return ChildEstado objects filtered by the idEstado column
 * @method     ChildEstado[]|ObjectCollection findByNombre(string $nombre) Return ChildEstado objects filtered by the nombre column
 * @method     ChildEstado[]|ObjectCollection findByPaisIdpais(int $Pais_idPais) Return ChildEstado objects filtered by the Pais_idPais column
 * @method     ChildEstado[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EstadoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \beans\beans\Base\EstadoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\beans\\beans\\Estado', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEstadoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEstadoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEstadoQuery) {
            return $criteria;
        }
        $query = new ChildEstadoQuery();
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
     * @return ChildEstado|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EstadoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EstadoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEstado A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idEstado, nombre, Pais_idPais FROM estado WHERE idEstado = :p0';
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
            /** @var ChildEstado $obj */
            $obj = new ChildEstado();
            $obj->hydrate($row);
            EstadoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEstado|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEstadoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EstadoTableMap::COL_IDESTADO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEstadoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EstadoTableMap::COL_IDESTADO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idEstado column
     *
     * Example usage:
     * <code>
     * $query->filterByIdestado(1234); // WHERE idEstado = 1234
     * $query->filterByIdestado(array(12, 34)); // WHERE idEstado IN (12, 34)
     * $query->filterByIdestado(array('min' => 12)); // WHERE idEstado > 12
     * </code>
     *
     * @param     mixed $idestado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEstadoQuery The current query, for fluid interface
     */
    public function filterByIdestado($idestado = null, $comparison = null)
    {
        if (is_array($idestado)) {
            $useMinMax = false;
            if (isset($idestado['min'])) {
                $this->addUsingAlias(EstadoTableMap::COL_IDESTADO, $idestado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idestado['max'])) {
                $this->addUsingAlias(EstadoTableMap::COL_IDESTADO, $idestado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EstadoTableMap::COL_IDESTADO, $idestado, $comparison);
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
     * @return $this|ChildEstadoQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EstadoTableMap::COL_NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the Pais_idPais column
     *
     * Example usage:
     * <code>
     * $query->filterByPaisIdpais(1234); // WHERE Pais_idPais = 1234
     * $query->filterByPaisIdpais(array(12, 34)); // WHERE Pais_idPais IN (12, 34)
     * $query->filterByPaisIdpais(array('min' => 12)); // WHERE Pais_idPais > 12
     * </code>
     *
     * @see       filterByPais()
     *
     * @param     mixed $paisIdpais The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEstadoQuery The current query, for fluid interface
     */
    public function filterByPaisIdpais($paisIdpais = null, $comparison = null)
    {
        if (is_array($paisIdpais)) {
            $useMinMax = false;
            if (isset($paisIdpais['min'])) {
                $this->addUsingAlias(EstadoTableMap::COL_PAIS_IDPAIS, $paisIdpais['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paisIdpais['max'])) {
                $this->addUsingAlias(EstadoTableMap::COL_PAIS_IDPAIS, $paisIdpais['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EstadoTableMap::COL_PAIS_IDPAIS, $paisIdpais, $comparison);
    }

    /**
     * Filter the query by a related \beans\beans\Pais object
     *
     * @param \beans\beans\Pais|ObjectCollection $pais The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEstadoQuery The current query, for fluid interface
     */
    public function filterByPais($pais, $comparison = null)
    {
        if ($pais instanceof \beans\beans\Pais) {
            return $this
                ->addUsingAlias(EstadoTableMap::COL_PAIS_IDPAIS, $pais->getIdpais(), $comparison);
        } elseif ($pais instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EstadoTableMap::COL_PAIS_IDPAIS, $pais->toKeyValue('PrimaryKey', 'Idpais'), $comparison);
        } else {
            throw new PropelException('filterByPais() only accepts arguments of type \beans\beans\Pais or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pais relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEstadoQuery The current query, for fluid interface
     */
    public function joinPais($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pais');

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
            $this->addJoinObject($join, 'Pais');
        }

        return $this;
    }

    /**
     * Use the Pais relation Pais object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \beans\beans\PaisQuery A secondary query class using the current class as primary query
     */
    public function usePaisQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPais($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pais', '\beans\beans\PaisQuery');
    }

    /**
     * Filter the query by a related \beans\beans\Direccion object
     *
     * @param \beans\beans\Direccion|ObjectCollection $direccion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEstadoQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion, $comparison = null)
    {
        if ($direccion instanceof \beans\beans\Direccion) {
            return $this
                ->addUsingAlias(EstadoTableMap::COL_IDESTADO, $direccion->getEstadoIdestado(), $comparison);
        } elseif ($direccion instanceof ObjectCollection) {
            return $this
                ->useDireccionQuery()
                ->filterByPrimaryKeys($direccion->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildEstadoQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildEstado $estado Object to remove from the list of results
     *
     * @return $this|ChildEstadoQuery The current query, for fluid interface
     */
    public function prune($estado = null)
    {
        if ($estado) {
            $this->addUsingAlias(EstadoTableMap::COL_IDESTADO, $estado->getIdestado(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the estado table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EstadoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EstadoTableMap::clearInstancePool();
            EstadoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EstadoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EstadoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EstadoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EstadoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EstadoQuery
