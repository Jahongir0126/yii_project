<?php 
namespace core\form;
use core\Model;

abstract class BaseField{

    public Model $model;
    public string $attribute;

    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;

    }

    abstract public function renderInput():string; 

    public function __toString()
    {
        return sprintf('
            <div class="form-group">
                <label>%s</label>
                %s
                <div class="invalid-feedback">
                    %s  
                </div> 
            </div>
        ',
        $this->model->labels()[$this->attribute]?? $this->attribute,    
        $this->renderInput(),
        $this->model->getFirstError($this->attribute)
        );
    }
}