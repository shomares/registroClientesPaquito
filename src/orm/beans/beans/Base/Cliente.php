<?php

namespace beans\beans\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use beans\beans\ClienteQuery as ChildClienteQuery;
use beans\beans\Cuestionario as ChildCuestionario;
use beans\beans\CuestionarioQuery as ChildCuestionarioQuery;
use beans\beans\Direccion as ChildDireccion;
use beans\beans\DireccionQuery as ChildDireccionQuery;
use beans\beans\Factura as ChildFactura;
use beans\beans\FacturaQuery as ChildFacturaQuery;
use beans\beans\Tipo as ChildTipo;
use beans\beans\TipoQuery as ChildTipoQuery;
use beans\beans\Map\ClienteTableMap;

/**
 * Base class that represents a row from the 'cliente' table.
 *
 *
 *
 * @package    propel.generator.beans.beans.Base
 */
abstract class Cliente implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\beans\\beans\\Map\\ClienteTableMap';


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
     * The value for the idcliente field.
     *
     * @var        int
     */
    protected $idcliente;

    /**
     * The value for the nombre field.
     *
     * @var        string
     */
    protected $nombre;

    /**
     * The value for the apellidopaterno field.
     *
     * @var        string
     */
    protected $apellidopaterno;

    /**
     * The value for the apellidomaterno field.
     *
     * @var        string
     */
    protected $apellidomaterno;

    /**
     * The value for the direccion_iddireccion field.
     *
     * @var        int
     */
    protected $direccion_iddireccion;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the telefono field.
     *
     * @var        string
     */
    protected $telefono;

    /**
     * The value for the celular field.
     *
     * @var        string
     */
    protected $celular;

    /**
     * The value for the institucion field.
     *
     * @var        string
     */
    protected $institucion;

    /**
     * The value for the tipo_idtipo field.
     *
     * @var        int
     */
    protected $tipo_idtipo;

    /**
     * The value for the cuestionario_idcuestionario field.
     *
     * @var        int
     */
    protected $cuestionario_idcuestionario;

    /**
     * The value for the factura_idfactura field.
     *
     * @var        int
     */
    protected $factura_idfactura;

    /**
     * @var        ChildCuestionario
     */
    protected $aCuestionario;

    /**
     * @var        ChildDireccion
     */
    protected $aDireccion;

    /**
     * @var        ChildFactura
     */
    protected $aFactura;

    /**
     * @var        ChildTipo
     */
    protected $aTipo;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of beans\beans\Base\Cliente object.
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
     * Compares this with another <code>Cliente</code> instance.  If
     * <code>obj</code> is an instance of <code>Cliente</code>, delegates to
     * <code>equals(Cliente)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Cliente The current object, for fluid interface
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
     * Get the [idcliente] column value.
     *
     * @return int
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * Get the [nombre] column value.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the [apellidopaterno] column value.
     *
     * @return string
     */
    public function getApellidopaterno()
    {
        return $this->apellidopaterno;
    }

    /**
     * Get the [apellidomaterno] column value.
     *
     * @return string
     */
    public function getApellidomaterno()
    {
        return $this->apellidomaterno;
    }

    /**
     * Get the [direccion_iddireccion] column value.
     *
     * @return int
     */
    public function getDireccionIddireccion()
    {
        return $this->direccion_iddireccion;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [telefono] column value.
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Get the [celular] column value.
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Get the [institucion] column value.
     *
     * @return string
     */
    public function getInstitucion()
    {
        return $this->institucion;
    }

    /**
     * Get the [tipo_idtipo] column value.
     *
     * @return int
     */
    public function getTipoIdtipo()
    {
        return $this->tipo_idtipo;
    }

    /**
     * Get the [cuestionario_idcuestionario] column value.
     *
     * @return int
     */
    public function getCuestionarioIdcuestionario()
    {
        return $this->cuestionario_idcuestionario;
    }

    /**
     * Get the [factura_idfactura] column value.
     *
     * @return int
     */
    public function getFacturaIdfactura()
    {
        return $this->factura_idfactura;
    }

    /**
     * Set the value of [idcliente] column.
     *
     * @param int $v new value
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     */
    public function setIdcliente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->idcliente !== $v) {
            $this->idcliente = $v;
            $this->modifiedColumns[ClienteTableMap::COL_IDCLIENTE] = true;
        }

        return $this;
    } // setIdcliente()

    /**
     * Set the value of [nombre] column.
     *
     * @param string $v new value
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     */
    public function setNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre !== $v) {
            $this->nombre = $v;
            $this->modifiedColumns[ClienteTableMap::COL_NOMBRE] = true;
        }

        return $this;
    } // setNombre()

    /**
     * Set the value of [apellidopaterno] column.
     *
     * @param string $v new value
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     */
    public function setApellidopaterno($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->apellidopaterno !== $v) {
            $this->apellidopaterno = $v;
            $this->modifiedColumns[ClienteTableMap::COL_APELLIDOPATERNO] = true;
        }

        return $this;
    } // setApellidopaterno()

    /**
     * Set the value of [apellidomaterno] column.
     *
     * @param string $v new value
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     */
    public function setApellidomaterno($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->apellidomaterno !== $v) {
            $this->apellidomaterno = $v;
            $this->modifiedColumns[ClienteTableMap::COL_APELLIDOMATERNO] = true;
        }

        return $this;
    } // setApellidomaterno()

    /**
     * Set the value of [direccion_iddireccion] column.
     *
     * @param int $v new value
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     */
    public function setDireccionIddireccion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->direccion_iddireccion !== $v) {
            $this->direccion_iddireccion = $v;
            $this->modifiedColumns[ClienteTableMap::COL_DIRECCION_IDDIRECCION] = true;
        }

        if ($this->aDireccion !== null && $this->aDireccion->getIddireccion() !== $v) {
            $this->aDireccion = null;
        }

        return $this;
    } // setDireccionIddireccion()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[ClienteTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [telefono] column.
     *
     * @param string $v new value
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     */
    public function setTelefono($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->telefono !== $v) {
            $this->telefono = $v;
            $this->modifiedColumns[ClienteTableMap::COL_TELEFONO] = true;
        }

        return $this;
    } // setTelefono()

    /**
     * Set the value of [celular] column.
     *
     * @param string $v new value
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     */
    public function setCelular($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->celular !== $v) {
            $this->celular = $v;
            $this->modifiedColumns[ClienteTableMap::COL_CELULAR] = true;
        }

        return $this;
    } // setCelular()

    /**
     * Set the value of [institucion] column.
     *
     * @param string $v new value
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     */
    public function setInstitucion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->institucion !== $v) {
            $this->institucion = $v;
            $this->modifiedColumns[ClienteTableMap::COL_INSTITUCION] = true;
        }

        return $this;
    } // setInstitucion()

    /**
     * Set the value of [tipo_idtipo] column.
     *
     * @param int $v new value
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     */
    public function setTipoIdtipo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tipo_idtipo !== $v) {
            $this->tipo_idtipo = $v;
            $this->modifiedColumns[ClienteTableMap::COL_TIPO_IDTIPO] = true;
        }

        if ($this->aTipo !== null && $this->aTipo->getIdtipo() !== $v) {
            $this->aTipo = null;
        }

        return $this;
    } // setTipoIdtipo()

    /**
     * Set the value of [cuestionario_idcuestionario] column.
     *
     * @param int $v new value
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     */
    public function setCuestionarioIdcuestionario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cuestionario_idcuestionario !== $v) {
            $this->cuestionario_idcuestionario = $v;
            $this->modifiedColumns[ClienteTableMap::COL_CUESTIONARIO_IDCUESTIONARIO] = true;
        }

        if ($this->aCuestionario !== null && $this->aCuestionario->getIdcuestionario() !== $v) {
            $this->aCuestionario = null;
        }

        return $this;
    } // setCuestionarioIdcuestionario()

    /**
     * Set the value of [factura_idfactura] column.
     *
     * @param int $v new value
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     */
    public function setFacturaIdfactura($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->factura_idfactura !== $v) {
            $this->factura_idfactura = $v;
            $this->modifiedColumns[ClienteTableMap::COL_FACTURA_IDFACTURA] = true;
        }

        if ($this->aFactura !== null && $this->aFactura->getIdfactura() !== $v) {
            $this->aFactura = null;
        }

        return $this;
    } // setFacturaIdfactura()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ClienteTableMap::translateFieldName('Idcliente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idcliente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ClienteTableMap::translateFieldName('Nombre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nombre = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ClienteTableMap::translateFieldName('Apellidopaterno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->apellidopaterno = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ClienteTableMap::translateFieldName('Apellidomaterno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->apellidomaterno = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ClienteTableMap::translateFieldName('DireccionIddireccion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->direccion_iddireccion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ClienteTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ClienteTableMap::translateFieldName('Telefono', TableMap::TYPE_PHPNAME, $indexType)];
            $this->telefono = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ClienteTableMap::translateFieldName('Celular', TableMap::TYPE_PHPNAME, $indexType)];
            $this->celular = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ClienteTableMap::translateFieldName('Institucion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->institucion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ClienteTableMap::translateFieldName('TipoIdtipo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tipo_idtipo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ClienteTableMap::translateFieldName('CuestionarioIdcuestionario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cuestionario_idcuestionario = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ClienteTableMap::translateFieldName('FacturaIdfactura', TableMap::TYPE_PHPNAME, $indexType)];
            $this->factura_idfactura = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = ClienteTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\beans\\beans\\Cliente'), 0, $e);
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
        if ($this->aDireccion !== null && $this->direccion_iddireccion !== $this->aDireccion->getIddireccion()) {
            $this->aDireccion = null;
        }
        if ($this->aTipo !== null && $this->tipo_idtipo !== $this->aTipo->getIdtipo()) {
            $this->aTipo = null;
        }
        if ($this->aCuestionario !== null && $this->cuestionario_idcuestionario !== $this->aCuestionario->getIdcuestionario()) {
            $this->aCuestionario = null;
        }
        if ($this->aFactura !== null && $this->factura_idfactura !== $this->aFactura->getIdfactura()) {
            $this->aFactura = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(ClienteTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildClienteQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCuestionario = null;
            $this->aDireccion = null;
            $this->aFactura = null;
            $this->aTipo = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Cliente::setDeleted()
     * @see Cliente::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildClienteQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
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
                ClienteTableMap::addInstanceToPool($this);
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

            if ($this->aCuestionario !== null) {
                if ($this->aCuestionario->isModified() || $this->aCuestionario->isNew()) {
                    $affectedRows += $this->aCuestionario->save($con);
                }
                $this->setCuestionario($this->aCuestionario);
            }

            if ($this->aDireccion !== null) {
                if ($this->aDireccion->isModified() || $this->aDireccion->isNew()) {
                    $affectedRows += $this->aDireccion->save($con);
                }
                $this->setDireccion($this->aDireccion);
            }

            if ($this->aFactura !== null) {
                if ($this->aFactura->isModified() || $this->aFactura->isNew()) {
                    $affectedRows += $this->aFactura->save($con);
                }
                $this->setFactura($this->aFactura);
            }

            if ($this->aTipo !== null) {
                if ($this->aTipo->isModified() || $this->aTipo->isNew()) {
                    $affectedRows += $this->aTipo->save($con);
                }
                $this->setTipo($this->aTipo);
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

        $this->modifiedColumns[ClienteTableMap::COL_IDCLIENTE] = true;
        if (null !== $this->idcliente) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClienteTableMap::COL_IDCLIENTE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClienteTableMap::COL_IDCLIENTE)) {
            $modifiedColumns[':p' . $index++]  = 'idCliente';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = 'nombre';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_APELLIDOPATERNO)) {
            $modifiedColumns[':p' . $index++]  = 'apellidoPaterno';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_APELLIDOMATERNO)) {
            $modifiedColumns[':p' . $index++]  = 'apellidoMaterno';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_DIRECCION_IDDIRECCION)) {
            $modifiedColumns[':p' . $index++]  = 'Direccion_idDireccion';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_TELEFONO)) {
            $modifiedColumns[':p' . $index++]  = 'telefono';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_CELULAR)) {
            $modifiedColumns[':p' . $index++]  = 'celular';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_INSTITUCION)) {
            $modifiedColumns[':p' . $index++]  = 'institucion';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_TIPO_IDTIPO)) {
            $modifiedColumns[':p' . $index++]  = 'tipo_idtipo';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_CUESTIONARIO_IDCUESTIONARIO)) {
            $modifiedColumns[':p' . $index++]  = 'Cuestionario_idCuestionario';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_FACTURA_IDFACTURA)) {
            $modifiedColumns[':p' . $index++]  = 'factura_idfactura';
        }

        $sql = sprintf(
            'INSERT INTO cliente (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'idCliente':
                        $stmt->bindValue($identifier, $this->idcliente, PDO::PARAM_INT);
                        break;
                    case 'nombre':
                        $stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
                        break;
                    case 'apellidoPaterno':
                        $stmt->bindValue($identifier, $this->apellidopaterno, PDO::PARAM_STR);
                        break;
                    case 'apellidoMaterno':
                        $stmt->bindValue($identifier, $this->apellidomaterno, PDO::PARAM_STR);
                        break;
                    case 'Direccion_idDireccion':
                        $stmt->bindValue($identifier, $this->direccion_iddireccion, PDO::PARAM_INT);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'telefono':
                        $stmt->bindValue($identifier, $this->telefono, PDO::PARAM_STR);
                        break;
                    case 'celular':
                        $stmt->bindValue($identifier, $this->celular, PDO::PARAM_STR);
                        break;
                    case 'institucion':
                        $stmt->bindValue($identifier, $this->institucion, PDO::PARAM_STR);
                        break;
                    case 'tipo_idtipo':
                        $stmt->bindValue($identifier, $this->tipo_idtipo, PDO::PARAM_INT);
                        break;
                    case 'Cuestionario_idCuestionario':
                        $stmt->bindValue($identifier, $this->cuestionario_idcuestionario, PDO::PARAM_INT);
                        break;
                    case 'factura_idfactura':
                        $stmt->bindValue($identifier, $this->factura_idfactura, PDO::PARAM_INT);
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
        $this->setIdcliente($pk);

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
        $pos = ClienteTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdcliente();
                break;
            case 1:
                return $this->getNombre();
                break;
            case 2:
                return $this->getApellidopaterno();
                break;
            case 3:
                return $this->getApellidomaterno();
                break;
            case 4:
                return $this->getDireccionIddireccion();
                break;
            case 5:
                return $this->getEmail();
                break;
            case 6:
                return $this->getTelefono();
                break;
            case 7:
                return $this->getCelular();
                break;
            case 8:
                return $this->getInstitucion();
                break;
            case 9:
                return $this->getTipoIdtipo();
                break;
            case 10:
                return $this->getCuestionarioIdcuestionario();
                break;
            case 11:
                return $this->getFacturaIdfactura();
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

        if (isset($alreadyDumpedObjects['Cliente'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Cliente'][$this->hashCode()] = true;
        $keys = ClienteTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdcliente(),
            $keys[1] => $this->getNombre(),
            $keys[2] => $this->getApellidopaterno(),
            $keys[3] => $this->getApellidomaterno(),
            $keys[4] => $this->getDireccionIddireccion(),
            $keys[5] => $this->getEmail(),
            $keys[6] => $this->getTelefono(),
            $keys[7] => $this->getCelular(),
            $keys[8] => $this->getInstitucion(),
            $keys[9] => $this->getTipoIdtipo(),
            $keys[10] => $this->getCuestionarioIdcuestionario(),
            $keys[11] => $this->getFacturaIdfactura(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCuestionario) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cuestionario';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'cuestionario';
                        break;
                    default:
                        $key = 'Cuestionario';
                }

                $result[$key] = $this->aCuestionario->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aDireccion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'direccion';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'direccion';
                        break;
                    default:
                        $key = 'Direccion';
                }

                $result[$key] = $this->aDireccion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aFactura) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'factura';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'factura';
                        break;
                    default:
                        $key = 'Factura';
                }

                $result[$key] = $this->aFactura->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTipo) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tipo';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tipo';
                        break;
                    default:
                        $key = 'Tipo';
                }

                $result[$key] = $this->aTipo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\beans\beans\Cliente
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ClienteTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\beans\beans\Cliente
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdcliente($value);
                break;
            case 1:
                $this->setNombre($value);
                break;
            case 2:
                $this->setApellidopaterno($value);
                break;
            case 3:
                $this->setApellidomaterno($value);
                break;
            case 4:
                $this->setDireccionIddireccion($value);
                break;
            case 5:
                $this->setEmail($value);
                break;
            case 6:
                $this->setTelefono($value);
                break;
            case 7:
                $this->setCelular($value);
                break;
            case 8:
                $this->setInstitucion($value);
                break;
            case 9:
                $this->setTipoIdtipo($value);
                break;
            case 10:
                $this->setCuestionarioIdcuestionario($value);
                break;
            case 11:
                $this->setFacturaIdfactura($value);
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
        $keys = ClienteTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdcliente($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNombre($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setApellidopaterno($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setApellidomaterno($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDireccionIddireccion($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setEmail($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setTelefono($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCelular($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setInstitucion($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTipoIdtipo($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCuestionarioIdcuestionario($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setFacturaIdfactura($arr[$keys[11]]);
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
     * @return $this|\beans\beans\Cliente The current object, for fluid interface
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
        $criteria = new Criteria(ClienteTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ClienteTableMap::COL_IDCLIENTE)) {
            $criteria->add(ClienteTableMap::COL_IDCLIENTE, $this->idcliente);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_NOMBRE)) {
            $criteria->add(ClienteTableMap::COL_NOMBRE, $this->nombre);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_APELLIDOPATERNO)) {
            $criteria->add(ClienteTableMap::COL_APELLIDOPATERNO, $this->apellidopaterno);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_APELLIDOMATERNO)) {
            $criteria->add(ClienteTableMap::COL_APELLIDOMATERNO, $this->apellidomaterno);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_DIRECCION_IDDIRECCION)) {
            $criteria->add(ClienteTableMap::COL_DIRECCION_IDDIRECCION, $this->direccion_iddireccion);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_EMAIL)) {
            $criteria->add(ClienteTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_TELEFONO)) {
            $criteria->add(ClienteTableMap::COL_TELEFONO, $this->telefono);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_CELULAR)) {
            $criteria->add(ClienteTableMap::COL_CELULAR, $this->celular);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_INSTITUCION)) {
            $criteria->add(ClienteTableMap::COL_INSTITUCION, $this->institucion);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_TIPO_IDTIPO)) {
            $criteria->add(ClienteTableMap::COL_TIPO_IDTIPO, $this->tipo_idtipo);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_CUESTIONARIO_IDCUESTIONARIO)) {
            $criteria->add(ClienteTableMap::COL_CUESTIONARIO_IDCUESTIONARIO, $this->cuestionario_idcuestionario);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_FACTURA_IDFACTURA)) {
            $criteria->add(ClienteTableMap::COL_FACTURA_IDFACTURA, $this->factura_idfactura);
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
        $criteria = ChildClienteQuery::create();
        $criteria->add(ClienteTableMap::COL_IDCLIENTE, $this->idcliente);

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
        $validPk = null !== $this->getIdcliente();

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
        return $this->getIdcliente();
    }

    /**
     * Generic method to set the primary key (idcliente column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdcliente($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdcliente();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \beans\beans\Cliente (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombre($this->getNombre());
        $copyObj->setApellidopaterno($this->getApellidopaterno());
        $copyObj->setApellidomaterno($this->getApellidomaterno());
        $copyObj->setDireccionIddireccion($this->getDireccionIddireccion());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setTelefono($this->getTelefono());
        $copyObj->setCelular($this->getCelular());
        $copyObj->setInstitucion($this->getInstitucion());
        $copyObj->setTipoIdtipo($this->getTipoIdtipo());
        $copyObj->setCuestionarioIdcuestionario($this->getCuestionarioIdcuestionario());
        $copyObj->setFacturaIdfactura($this->getFacturaIdfactura());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdcliente(NULL); // this is a auto-increment column, so set to default value
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
     * @return \beans\beans\Cliente Clone of current object.
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
     * Declares an association between this object and a ChildCuestionario object.
     *
     * @param  ChildCuestionario $v
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCuestionario(ChildCuestionario $v = null)
    {
        if ($v === null) {
            $this->setCuestionarioIdcuestionario(NULL);
        } else {
            $this->setCuestionarioIdcuestionario($v->getIdcuestionario());
        }

        $this->aCuestionario = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCuestionario object, it will not be re-added.
        if ($v !== null) {
            $v->addCliente($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCuestionario object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCuestionario The associated ChildCuestionario object.
     * @throws PropelException
     */
    public function getCuestionario(ConnectionInterface $con = null)
    {
        if ($this->aCuestionario === null && ($this->cuestionario_idcuestionario !== null)) {
            $this->aCuestionario = ChildCuestionarioQuery::create()->findPk($this->cuestionario_idcuestionario, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCuestionario->addClientes($this);
             */
        }

        return $this->aCuestionario;
    }

    /**
     * Declares an association between this object and a ChildDireccion object.
     *
     * @param  ChildDireccion $v
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDireccion(ChildDireccion $v = null)
    {
        if ($v === null) {
            $this->setDireccionIddireccion(NULL);
        } else {
            $this->setDireccionIddireccion($v->getIddireccion());
        }

        $this->aDireccion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildDireccion object, it will not be re-added.
        if ($v !== null) {
            $v->addCliente($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildDireccion object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildDireccion The associated ChildDireccion object.
     * @throws PropelException
     */
    public function getDireccion(ConnectionInterface $con = null)
    {
        if ($this->aDireccion === null && ($this->direccion_iddireccion !== null)) {
            $this->aDireccion = ChildDireccionQuery::create()->findPk($this->direccion_iddireccion, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDireccion->addClientes($this);
             */
        }

        return $this->aDireccion;
    }

    /**
     * Declares an association between this object and a ChildFactura object.
     *
     * @param  ChildFactura $v
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     * @throws PropelException
     */
    public function setFactura(ChildFactura $v = null)
    {
        if ($v === null) {
            $this->setFacturaIdfactura(NULL);
        } else {
            $this->setFacturaIdfactura($v->getIdfactura());
        }

        $this->aFactura = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildFactura object, it will not be re-added.
        if ($v !== null) {
            $v->addCliente($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildFactura object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildFactura The associated ChildFactura object.
     * @throws PropelException
     */
    public function getFactura(ConnectionInterface $con = null)
    {
        if ($this->aFactura === null && ($this->factura_idfactura !== null)) {
            $this->aFactura = ChildFacturaQuery::create()->findPk($this->factura_idfactura, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aFactura->addClientes($this);
             */
        }

        return $this->aFactura;
    }

    /**
     * Declares an association between this object and a ChildTipo object.
     *
     * @param  ChildTipo $v
     * @return $this|\beans\beans\Cliente The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTipo(ChildTipo $v = null)
    {
        if ($v === null) {
            $this->setTipoIdtipo(NULL);
        } else {
            $this->setTipoIdtipo($v->getIdtipo());
        }

        $this->aTipo = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTipo object, it will not be re-added.
        if ($v !== null) {
            $v->addCliente($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTipo object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTipo The associated ChildTipo object.
     * @throws PropelException
     */
    public function getTipo(ConnectionInterface $con = null)
    {
        if ($this->aTipo === null && ($this->tipo_idtipo !== null)) {
            $this->aTipo = ChildTipoQuery::create()->findPk($this->tipo_idtipo, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTipo->addClientes($this);
             */
        }

        return $this->aTipo;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCuestionario) {
            $this->aCuestionario->removeCliente($this);
        }
        if (null !== $this->aDireccion) {
            $this->aDireccion->removeCliente($this);
        }
        if (null !== $this->aFactura) {
            $this->aFactura->removeCliente($this);
        }
        if (null !== $this->aTipo) {
            $this->aTipo->removeCliente($this);
        }
        $this->idcliente = null;
        $this->nombre = null;
        $this->apellidopaterno = null;
        $this->apellidomaterno = null;
        $this->direccion_iddireccion = null;
        $this->email = null;
        $this->telefono = null;
        $this->celular = null;
        $this->institucion = null;
        $this->tipo_idtipo = null;
        $this->cuestionario_idcuestionario = null;
        $this->factura_idfactura = null;
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
        } // if ($deep)

        $this->aCuestionario = null;
        $this->aDireccion = null;
        $this->aFactura = null;
        $this->aTipo = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ClienteTableMap::DEFAULT_STRING_FORMAT);
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
