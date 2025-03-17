<?php
namespace FacturaScripts\Plugins\SamplePlugin\Lib\Widget;

use FacturaScripts\Core\Lib\Widget\BaseWidget;

class WidgetShowDummyColor extends BaseWidget
{

    public function tableCell($model, $display = 'left')
    {
        $this->setValue($model);

        $outHtml = "---";
        
        if($this->value){
            $outHtml = str_replace("%%VALUE%%", (string)$this->value, <<<'HTML'
                <div style=" display: flex; ">
                    <div id="a1231231231" style="
                        min-width: 30px;
                        border: solid #000000 1px;
                        border-right: none;
                        background-color: %%VALUE%%;
                        border-top-left-radius: 10px;
                        border-bottom-left-radius: 10px;
                        padding:5px;
                    ">
                        &nbsp;
                    </div>
                    <div style="
                        padding:5px;
                        border: solid #000000 1px;
                        border-top-right-radius: 10px;
                        border-bottom-right-radius: 10px;
                        background-color: #FFFFFF; 
                    ">
                        %%VALUE%%
                    </div>
                </div>
            HTML);
        }


        $class = $this->combineClasses($this->tableCellClass('text-' . $display), $this->class);
        return '<td class="' . $class . '">' . $outHtml . '</td>';
    }
}