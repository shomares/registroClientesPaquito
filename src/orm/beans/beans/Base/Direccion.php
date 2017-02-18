<?php

namespace beans\beans\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use beans\beans\Cliente as ChildCliente;
use beans\beans\ClienteQuery as ChildClienteQuery;
use beans\beans\Direccion as ChildDireccion;
use beans\beans\DireccionQuery as ChildDireccionQuery;
use beans\beans\Estado as ChildEstado;
use beans\beans\EstadoQuery as ChildEstadoQuery;
use beans\beans\Factura as ChildFactura;
use beans\beans\FacturaQuery as ChildFacturaQuery;
use beans\beans\Map\ClienteTableMap;
use beans\beans\Map\DireccionTableMap;
use beans\beans\Map\FacturaTableMap;

/**
 * Base class that represents a row from the 'direccion' table.
 *
 *
 *
 * @package    propel.generator.beans.beans.Base
 */
abstract class Direccion implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\beans\\beans\\Map\\DireccionTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the iddireccion field.
     *
     * @var        int
     */
    protected $iddireccion;

    /**
     * The value for the calle field.
     *
     * @var        string
     */
    protected $calle;

    /**
     * The value for the colonia field.
     *
     * @var        string
     */
    protected $colonia;

    /**
     * The value for the cp field.
     *
     * @var        string
     */
    protected $cp;

    /**
     * The value for the estado_idestado field.
     *
     * @var        int
     */
    protected $estado_idestado;

    /**
     * @var        ChildEstado
     */
    protected $aEstado;

    /**
     * @var        ObjectCollection|ChildCliente[] Collection to store aggregation of ChildCliente objects.
     */
    protected $collClientes;
    protected $collClientesPartial;

    /**
     * @var        ObjectCollection|ChildFactura[] Collection to store aggregation of ChildFactura objects.
     */
    protected $collFacturas;
    protected $collFacturasPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCliente[]
     */
    protected $clientesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildFactura[]
     */
    protected $facturasScheduledForDeletion = null;

    /**
     * Initializes internal state of beans\beans\Base\Direccion object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Direccion</code> instance.  If
     * <code>obj</code> is an instance of <code>Direccion</code>, delegates to
     * <code>equals(Direccion)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Direccion The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [iddireccion] column value.
     *
     * @return int
     */
    public function getIddireccion()
    {
        return $this->iddireccion;
    }

    /**
     * Get the [calle] column value.
     *
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Get the [colonia] column value.
     *
     * @return string
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Get the [cp] column value.
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Get the [estado_idestado] column value.
     *
     * @return int
     */
    public function getEstadoIdestado()
    {
        return $this->estado_idestado;
    }

    /**
     * Set the value of [iddireccion] column.
     *
     * @param int $v new value
     * @return $this|\beans\beans\Direccion The current object (for fluent API support)
     */
    public function setIddireccion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->iddireccion !== $v) {
            $this->iddireccion = $v;
            $this->modifiedColumns[DireccionTableMap::COL_IDDIRECCION] = true;
        }

        return $this;
    } // setIddireccion()

    /**
     * Set the value of [calle] column.
     *
     * @param string $v new value
     * @return $this|\beans\beans\Direccion The current object (for fluent API support)
     */
    public function setCalle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->calle !== $v) {
            $this->calle = $v;
            $this->modifiedColumns[DireccionTableMap::COL_CALLE] = true;
        }

        return $this;
    } // setCalle()

    /**
     * Set the value of [colonia] column.
     *
     * @param string $v new value
     * @return $this|\beans\beans\Direccion The current object (for fluent API support)
     */
    public function setColonia($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->colonia !== $v) {
            $this->colonia = $v;
            $this->modifiedColumns[DireccionTableMap::COL_COLONIA] = true;
        }

        return $this;
    } // setColonia()

    /**
     * Set the value of [cp] column.
     *
     * @param string $v new value
     * @return $this|\beans\beans\Direccion The current object (for fluent API support)
     */
    public function setCp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cp !== $v) {
            $this->cp = $v;
            $this->modifiedColumns[DireccionTableMap::COL_CP] = true;
        }

        return $this;
    } // setCp()

    /**
     * Set the value of [estado_idestado] column.
     *
     * @param int $v new value
     * @return $this|\beans\beans\Direccion The current object (for fluent API support)
     */
    public function setEstadoIdestado($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->estado_idestado !== $v) {
            $this->estado_idestado = $v;
            $this->modifiedColumns[DireccionTableMap::COL_ESTADO_IDESTADO] = true;
        }

        if ($this->aEstado !== null && $this->aEstado->getIdestado() !== $v) {
            $this->aEstado = null;
        }

        return $this;
    } // setEstadoIdestado()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : DireccionTableMap::translateFieldName('Iddireccion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->iddireccion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : DireccionTableMap::translateFieldName('Calle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->calle = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : DireccionTableMap::translateFieldName('Colonia', TableMap::TYPE_PHPNAME, $indexType)];
            $this->colonia = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : DireccionTableMap::translateFieldName('Cp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : DireccionTableMap::translateFieldName('EstadoIdestado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estado_idestado = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = DireccionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\beans\\beans\\Direccion'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aEstado !== null && $this->estado_idestado !== $this->aEstado->getIdestado()) {
            $this->aEstado = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DireccionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildDireccionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEstado = null;
            $this->collClientes = null;

            $this->collFacturas = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Direccion::setDeleted()
     * @see Direccion::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(DireccionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildDireccionQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(DireccionTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                DireccionTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aEstado !== null) {
                if ($this->aEstado->isModified() || $this->aEstado->isNew()) {
                    $affectedRows += $this->aEstado->save($con);
                }
                $this->setEstado($this->aEstado);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->clientesScheduledForDeletion !== null) {
                if (!$this->clientesScheduledForDeletion->isEmpty()) {
                    \beans\beans\ClienteQuery::create()
                        ->filterByPrimaryKeys($this->clientesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->clientesScheduledForDeletion = null;
                }
            }

            if ($this->collClientes !== null) {
                foreach ($this->collClientes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->facturasScheduledForDeletion !== null) {
                if (!$this->facturasScheduledForDeletion->isEmpty()) {
                    \beans\beans\FacturaQuery::create()
                        ->filterByPrimaryKeys($this->facturasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->facturasScheduledForDeletion = null;
                }
            }

            if ($this->collFacturas !== null) {
                foreach ($this->collFacturas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[DireccionTableMap::COL_IDDIRECCION] = true;
        if (null !== $this->iddireccion) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . DireccionTableMap::COL_IDDIRECCION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DireccionTableMap::COL_IDDIRECCION)) {
            $modifiedColumns[':p' . $index++]  = 'idDireccion';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_CALLE)) {
            $modifiedColumns[':p' . $index++]  = 'Calle';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_COLONIA)) {
            $modifiedColumns[':p' . $index++]  = 'Colonia';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_CP)) {
            $modifiedColumns[':p' . $index++]  = 'CP';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_ESTADO_IDESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'Estado_idEstado';
        }

        $sql = sprintf(
            'INSERT INTO direccion (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'idDireccion':
                        $stmt->bindValue($identifier, $this->iddireccion, PDO::PARAM_INT);
                        break;
                    case 'Calle':
                        $stmt->bindValue($identifier, $this->calle, PDO::PARAM_STR);
                        break;
                    case 'Colonia':
                        $stmt->bindValue($identifier, $this->colonia, PDO::PARAM_STR);
                        break;
                    case 'CP':
                        $stmt->bindValue($identifier, $this->cp, PDO::PARAM_STR);
                        break;
                    case 'Estado_idEstado':
                        $stmt->bindValue($identifier, $this->estado_idestado, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIddireccion($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = DireccionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIddireccion();
                break;
            case 1:
                return $this->getCalle();
                break;
            case 2:
                return $this->getColonia();
                break;
            case 3:
                return $this->getCp();
                break;
            case 4:
                return $this->getEstadoIdestado();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Direccion'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Direccion'][$this->hashCode()] = true;
        $keys = DireccionTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIddireccion(),
            $keys[1] => $this->getCalle(),
            $keys[2] => $this->getColonia(),
            $keys[3] => $this->getCp(),
            $keys[4] => $this->getEstadoIdestado(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aEstado) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'estado';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'estado';
                        break;
                    default:
                        $key = 'Estado';
                }

                $result[$key] = $this->aEstado->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collClientes) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'clientes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'clientes';
                        break;
                    default:
                        $key = 'Clientes';
                }

                $result[$key] = $this->collClientes->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFacturas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'facturas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'facturas';
                        break;
                    default:
                        $key = 'Facturas';
                }

                $result[$key] = $this->collFacturas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\beans\beans\Direccion
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = DireccionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\beans\beans\Direccion
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIddireccion($value);
                break;
            case 1:
                $this->setCalle($value);
                break;
            case 2:
                $this->setColonia($value);
                break;
            case 3:
                $this->setCp($value);
                break;
            case 4:
                $this->setEstadoIdestado($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = DireccionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIddireccion($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCalle($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setColonia($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCp($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEstadoIdestado($arr[$keys[4]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\beans\beans\Direccion The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(DireccionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(DireccionTableMap::COL_IDDIRECCION)) {
            $criteria->add(DireccionTableMap::COL_IDDIRECCION, $this->iddireccion);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_CALLE)) {
            $criteria->add(DireccionTableMap::COL_CALLE, $this->calle);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_COLONIA)) {
            $criteria->add(DireccionTableMap::COL_COLONIA, $this->colonia);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_CP)) {
            $criteria->add(DireccionTableMap::COL_CP, $this->cp);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_ESTADO_IDESTADO)) {
            $criteria->add(DireccionTableMap::COL_ESTADO_IDESTADO, $this->estado_idestado);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildDireccionQuery::create();
        $criteria->add(DireccionTableMap::COL_IDDIRECCION, $this->iddireccion);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIddireccion();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIddireccion();
    }

    /**
     * Generic method to set the primary key (iddireccion column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIddireccion($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIddireccion();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \beans\beans\Direccion (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCalle($this->getCalle());
        $copyObj->setColonia($this->getColonia());
        $copyObj->setCp($this->getCp());
        $copyObj->setEstadoIdestado($this->getEstadoIdestado());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getClientes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCliente($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFacturas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFactura($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIddireccion(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \beans\beans\Direccion Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildEstado object.
     *
     * @param  ChildEstado $v
     * @return $this|\beans\beans\Direccion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEstado(ChildEstado $v = null)
    {
        if ($v === null) {
            $this->setEstadoIdestado(NULL);
        } else {
            $this->setEstadoIdestado($v->getIdestado());
        }

        $this->aEstado = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEstado object, it will not be re-added.
        if ($v !== null) {
            $v->addDireccion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEstado object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEstado The associated ChildEstado object.
     * @throws PropelException
     */
    public function getEstado(ConnectionInterface $con = null)
    {
        if ($this->aEstado === null && ($this->estado_idestado !== null)) {
            $this->aEstado = ChildEstadoQuery::create()->findPk($this->estado_idestado, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEstado->addDireccions($this);
             */
        }

        return $this->aEstado;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Cliente' == $relationName) {
            return $this->initClientes();
        }
        if ('Factura' == $relationName) {
            return $this->initFacturas();
        }
    }

    /**
     * Clears out the collClientes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addClientes()
     */
    public function clearClientes()
    {
        $this->collClientes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collClientes collection loaded partially.
     */
    public function resetPartialClientes($v = true)
    {
        $this->collClientesPartial = $v;
    }

    /**
     * Initializes the collClientes collection.
     *
     * By default this just sets the collClientes collection to an empty array (like clearcollClientes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClientes($overrideExisting = true)
    {
        if (null !== $this->collClientes && !$overrideExisting) {
            return;
        }

        $collectionClassName = ClienteTableMap::getTableMap()->getCollectionClassName();

        $this->collClientes = new $collectionClassName;
        $this->collClientes->setModel('\beans\beans\Cliente');
    }

    /**
     * Gets an array of ChildCliente objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildDireccion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCliente[] List of ChildCliente objects
     * @throws PropelException
     */
    public function getClientes(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collClientesPartial && !$this->isNew();
        if (null === $this->collClientes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClientes) {
                // return empty collection
                $this->initClientes();
            } else {
                $collClientes = ChildClienteQuery::create(null, $criteria)
                    ->filterByDireccion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collClientesPartial && count($collClientes)) {
                        $this->initClientes(false);

                        foreach ($collClientes as $obj) {
                            if (false == $this->collClientes->contains($obj)) {
                                $this->collClientes->append($obj);
                            }
                        }

                        $this->collClientesPartial = true;
                    }

                    return $collClientes;
                }

                if ($partial && $this->collClientes) {
                    foreach ($this->collClientes as $obj) {
                        if ($obj->isNew()) {
                            $collClientes[] = $obj;
                        }
                    }
                }

                $this->collClientes = $collClientes;
                $this->collClientesPartial = false;
            }
        }

        return $this->collClientes;
    }

    /**
     * Sets a collection of ChildCliente objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $clientes A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildDireccion The current object (for fluent API support)
     */
    public function setClientes(Collection $clientes, ConnectionInterface $con = null)
    {
        /** @var ChildCliente[] $clientesToDelete */
        $clientesToDelete = $this->getClientes(new Criteria(), $con)->diff($clientes);


        $this->clientesScheduledForDeletion = $clientesToDelete;

        foreach ($clientesToDelete as $clienteRemoved) {
            $clienteRemoved->setDireccion(null);
        }

        $this->collClientes = null;
        foreach ($clientes as $cliente) {
            $this->addCliente($cliente);
        }

        $this->collClientes = $clientes;
        $this->collClientesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Cliente objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Cliente objects.
     * @throws PropelException
     */
    public function countClientes(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collClientesPartial && !$this->isNew();
        if (null === $this->collClientes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClientes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getClientes());
            }

            $query = ChildClienteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDireccion($this)
                ->count($con);
        }

        return count($this->collClientes);
    }

    /**
     * Method called to associate a ChildCliente object to this object
     * through the ChildCliente foreign key attribute.
     *
     * @param  ChildCliente $l ChildCliente
     * @return $this|\beans\beans\Direccion The current object (for fluent API support)
     */
    public function addCliente(ChildCliente $l)
    {
        if ($this->collClientes === null) {
            $this->initClientes();
            $this->collClientesPartial = true;
        }

        if (!$this->collClientes->contains($l)) {
            $this->doAddCliente($l);

            if ($this->clientesScheduledForDeletion and $this->clientesScheduledForDeletion->contains($l)) {
                $this->clientesScheduledForDeletion->remove($this->clientesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCliente $cliente The ChildCliente object to add.
     */
    protected function doAddCliente(ChildCliente $cliente)
    {
        $this->collClientes[]= $cliente;
        $cliente->setDireccion($this);
    }

    /**
     * @param  ChildCliente $cliente The ChildCliente object to remove.
     * @return $this|ChildDireccion The current object (for fluent API support)
     */
    public function removeCliente(ChildCliente $cliente)
    {
        if ($this->getClientes()->contains($cliente)) {
            $pos = $this->collClientes->search($cliente);
            $this->collClientes->remove($pos);
            if (null === $this->clientesScheduledForDeletion) {
                $this->clientesScheduledForDeletion = clone $this->collClientes;
                $this->clientesScheduledForDeletion->clear();
            }
            $this->clientesScheduledForDeletion[]= clone $cliente;
            $cliente->setDireccion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Direccion is new, it will return
     * an empty collection; or if this Direccion has previously
     * been saved, it will retrieve related Clientes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Direccion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCliente[] List of ChildCliente objects
     */
    public function getClientesJoinCuestionario(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildClienteQuery::create(null, $criteria);
        $query->joinWith('Cuestionario', $joinBehavior);

        return $this->getClientes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Direccion is new, it will return
     * an empty collection; or if this Direccion has previously
     * been saved, it will retrieve related Clientes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Direccion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCliente[] List of ChildCliente objects
     */
    public function getClientesJoinFactura(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildClienteQuery::create(null, $criteria);
        $query->joinWith('Factura', $joinBehavior);

        return $this->getClientes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Direccion is new, it will return
     * an empty collection; or if this Direccion has previously
     * been saved, it will retrieve related Clientes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Direccion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCliente[] List of ChildCliente objects
     */
    public function getClientesJoinTipo(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildClienteQuery::create(null, $criteria);
        $query->joinWith('Tipo', $joinBehavior);

        return $this->getClientes($query, $con);
    }

    /**
     * Clears out the collFacturas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFacturas()
     */
    public function clearFacturas()
    {
        $this->collFacturas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collFacturas collection loaded partially.
     */
    public function resetPartialFacturas($v = true)
    {
        $this->collFacturasPartial = $v;
    }

    /**
     * Initializes the collFacturas collection.
     *
     * By default this just sets the collFacturas collection to an empty array (like clearcollFacturas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFacturas($overrideExisting = true)
    {
        if (null !== $this->collFacturas && !$overrideExisting) {
            return;
        }

        $collectionClassName = FacturaTableMap::getTableMap()->getCollectionClassName();

        $this->collFacturas = new $collectionClassName;
        $this->collFacturas->setModel('\beans\beans\Factura');
    }

    /**
     * Gets an array of ChildFactura objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildDireccion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildFactura[] List of ChildFactura objects
     * @throws PropelException
     */
    public function getFacturas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collFacturasPartial && !$this->isNew();
        if (null === $this->collFacturas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFacturas) {
                // return empty collection
                $this->initFacturas();
            } else {
                $collFacturas = ChildFacturaQuery::create(null, $criteria)
                    ->filterByDireccion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collFacturasPartial && count($collFacturas)) {
                        $this->initFacturas(false);

                        foreach ($collFacturas as $obj) {
                            if (false == $this->collFacturas->contains($obj)) {
                                $this->collFacturas->append($obj);
                            }
                        }

                        $this->collFacturasPartial = true;
                    }

                    return $collFacturas;
                }

                if ($partial && $this->collFacturas) {
                    foreach ($this->collFacturas as $obj) {
                        if ($obj->isNew()) {
                            $collFacturas[] = $obj;
                        }
                    }
                }

                $this->collFacturas = $collFacturas;
                $this->collFacturasPartial = false;
            }
        }

        return $this->collFacturas;
    }

    /**
     * Sets a collection of ChildFactura objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $facturas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildDireccion The current object (for fluent API support)
     */
    public function setFacturas(Collection $facturas, ConnectionInterface $con = null)
    {
        /** @var ChildFactura[] $facturasToDelete */
        $facturasToDelete = $this->getFacturas(new Criteria(), $con)->diff($facturas);


        $this->facturasScheduledForDeletion = $facturasToDelete;

        foreach ($facturasToDelete as $facturaRemoved) {
            $facturaRemoved->setDireccion(null);
        }

        $this->collFacturas = null;
        foreach ($facturas as $factura) {
            $this->addFactura($factura);
        }

        $this->collFacturas = $facturas;
        $this->collFacturasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Factura objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Factura objects.
     * @throws PropelException
     */
    public function countFacturas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collFacturasPartial && !$this->isNew();
        if (null === $this->collFacturas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFacturas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getFacturas());
            }

            $query = ChildFacturaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDireccion($this)
                ->count($con);
        }

        return count($this->collFacturas);
    }

    /**
     * Method called to associate a ChildFactura object to this object
     * through the ChildFactura foreign key attribute.
     *
     * @param  ChildFactura $l ChildFactura
     * @return $this|\beans\beans\Direccion The current object (for fluent API support)
     */
    public function addFactura(ChildFactura $l)
    {
        if ($this->collFacturas === null) {
            $this->initFacturas();
            $this->collFacturasPartial = true;
        }

        if (!$this->collFacturas->contains($l)) {
            $this->doAddFactura($l);

            if ($this->facturasScheduledForDeletion and $this->facturasScheduledForDeletion->contains($l)) {
                $this->facturasScheduledForDeletion->remove($this->facturasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildFactura $factura The ChildFactura object to add.
     */
    protected function doAddFactura(ChildFactura $factura)
    {
        $this->collFacturas[]= $factura;
        $factura->setDireccion($this);
    }

    /**
     * @param  ChildFactura $factura The ChildFactura object to remove.
     * @return $this|ChildDireccion The current object (for fluent API support)
     */
    public function removeFactura(ChildFactura $factura)
    {
        if ($this->getFacturas()->contains($factura)) {
            $pos = $this->collFacturas->search($factura);
            $this->collFacturas->remove($pos);
            if (null === $this->facturasScheduledForDeletion) {
                $this->facturasScheduledForDeletion = clone $this->collFacturas;
                $this->facturasScheduledForDeletion->clear();
            }
            $this->facturasScheduledForDeletion[]= clone $factura;
            $factura->setDireccion(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aEstado) {
            $this->aEstado->removeDireccion($this);
        }
        $this->iddireccion = null;
        $this->calle = null;
        $this->colonia = null;
        $this->cp = null;
        $this->estado_idestado = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collClientes) {
                foreach ($this->collClientes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFacturas) {
                foreach ($this->collFacturas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collClientes = null;
        $this->collFacturas = null;
        $this->aEstado = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DireccionTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
