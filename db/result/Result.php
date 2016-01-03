<?php

namespace SYSTEM\DB;

abstract class Result {

    public abstract function count();

    public abstract function affectedRows();

    public abstract function next($object = false);

    public abstract function seek($row_number);

    public abstract function close();
}