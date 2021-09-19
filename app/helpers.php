<?php
function prx($data)
{
    echo "<pre>";
    print_r($data);
    exit;
}

function pr($data)
{
    echo "<pre>";
    print_r($data);
}
function prm($data)
{
    $cat=json_decode(json_encode($data),true);
    echo "<pre>";
    print_r($cat);
}

function StringRepair($temptext)
{
    $temptext = trim($temptext);
    $temptext = str_replace("'", "&#39;", $temptext);
    $temptext = str_replace("\"", "&#34;", $temptext);
    $temptext = ucwords($temptext);
    return $temptext;
}

function alert($message)
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>  ' . $message . '	</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

function is_delete($tabul, $id)
{
    $result = DB::table($tabul)->where('id', $id)->update(['isdelete' => "1"]);
    return $result;
}
function getdata($tabul)
{
    $result = DB::table($tabul)->where('isdelete', 0)->orderBy('id', 'DESC')->get();
    return $result;
}

function editbox($colname, $label, $fieldname, $placeholder, $value, $script = "")
{
    $isrequired = strpos($script, "required");
    if (is_numeric($isrequired)) {
        $label .= " <b class='text-danger'>*</b>";
    }
    echo '<div class="col-md-' . $colname . '">
              <fieldset class="form-group">
              <label class="form-label semibold">' . $label . '</label>
              <input type="text" ' . $script . ' name="' . $fieldname . '" value="' . $value . '" id="' . $fieldname . '" placeholder ="' . $placeholder . '" class="form-control">
              </fieldset>
            </div>';
}
function getcom()
{
    $result = array();
    $result = DB::table('tbl_settings')->select('id', 'company_name')->where('isdelete', 0)->get();
    $i = 0;
    foreach ($result as $item) {
        $i++;
        $data[$i] = $item;
    }
    return $data;
}

function datepicker($colname,$label,$fieldname,$placeholder,$value,$script=""){
    $isrequired=strpos($script,"required");
 if(is_numeric($isrequired))
 {
     $label.=" <b class='text-danger'>*</b>";
 }
     echo '<div class="col-md-'.$colname.'">
                         <fieldset class="form-group">
                             <label class="form-label">'.$label.'</label>
                             <div class="input-group date ">
                                 <input type="text" class="form-control datetimepicker" '.$script.' id="'.$fieldname.'" name="'.$fieldname.'" value="'.$value.'">
                                 <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                             </div>
                         </fieldset>
                     </div>';
}

function numberbox($colname,$label,$fieldname,$placeholder,$value,$script=""){
    $isrequired=strpos($script,"required");
    if(is_numeric($isrequired))
    {
        $label.=" <b class='text-danger'>*</b>";
    }
    echo '<div class="col-md-'.$colname.'">
              <fieldset class="form-group">
              <label class="form-label semibold">'.$label.'</label>
              <input type="number" '.$script.' name="'.$fieldname.'" value="'.$value.'" id="'.$fieldname.'" placeholder ="'.$placeholder.'" class="form-control">
              </fieldset>
            </div>';
}
function textareabox($colname,$label,$fieldname,$placeholder,$value,$script=''){
    $isrequired=strpos($script,"required");
    if(is_numeric($isrequired))
    {
        $label.=" <b class='text-danger'>*</b>";
    }
    echo '<div class="col-lg-'.$colname.'">
            <fieldset class="form-group">
                <label class="form-label semibold">'.$label.'</label>
            <textarea name="'.$fieldname.'"  id="'.$fieldname.'" placeholder="'.$placeholder.'" class="form-control" style="height:100px;" '.$script.' >'.$value.'</textarea>
            </fieldset>
            </div>';
}