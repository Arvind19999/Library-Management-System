 <?php
function inputComponent($for,$userName,$id,$Placeholder,$class,$type,$icon_class,$name){
$ele = "
<div class=\"form-group\">
<label for='$for' >$userName</label>
<input type='$type' class='$class' id='$id' placeholder='$Placeholder' name='$name' require>
<i class='$icon_class'></i>
</div>";
echo $ele;
}

function buttonComponent($class,$style,$type,$btn_name,$admin_btn_id,$label){
    $btns="
    <div class=\"form-group\">
    <button class='$class'
    style='$style' type='$type' name='$btn_name' id='$admin_btn_id'>
    $label</button>
  </div>";
  echo $btns;
}
function lists($class,$style,$a_class,$directed_page,$Label){
    $nav_list="
    <li class='$class' style='$style'>
    <a class='$a_class' href='$directed_page'>$Label</a>
  </li>";
  echo $nav_list;
}

?> 
