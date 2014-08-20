<?php
class IndexAction extends CommonAction {
	
    public function index()
    {
        $Restaurant = M('Restaurant_member');
        $audit = $_GET['audit'];
        $search_by = $_POST['search_by'];
        if($audit == "0"){
            if($_POST['sch_button']){
                if($_POST['search_by'] == 0){
                    $where = "status='1'";
                }else if($_POST['search_by'] == 1){
                    $where = "nickname like '%".$_POST['search_field']."%'";
                }else if($_POST['search_by'] == 2){
                    $where = "email =".$_POST['search_field'];
                }else if($_POST['search_by'] == 3){
                    $where = "phone = ".$_POST['search_field'];
                }else if($_POST['search_by'] == 4){
                    $where = "zip = ".$_POST['search_field'];
                }else if($_POST['search_by'] == 5){
                    $where = "state = ".$_POST['search_field'];
                }else{
                     $where = " status='0'";
                }
            }else{
                $where = " status='0'";
            }
        }else{
            if($_POST['sch_button']){
                if($_POST['search_by'] == 0){
                    $where = "status='1'";
                }else if($_POST['search_by'] == 1){
                    $where = "nickname like '%".$_POST['search_field']."%'";
                }else if($_POST['search_by'] == 2){
                    $where = "email =".$_POST['search_field'];
                }else if($_POST['search_by'] == 3){
                    $where = "phone = ".$_POST['search_field'];
                }else if($_POST['search_by'] == 4){
                    $where = "zip = ".$_POST['search_field'];
                }else if($_POST['search_by'] == 5){
                    $where = "state = ".$_POST['search_field'];
                }else{
                    $where = "status='1'";
                }
            }else{
                $where = "status='1'";
            }
            
        }
        
        $list = $Restaurant->where($where)->select();//echo $Restaurant->getLastSql(); 
        $restaurant_count = $Restaurant->where($where)->count();
        $_SESSION['restaurant_count'] = $restaurant_count;

        $this->assign('list',$list);
        $this->display();
    }
}
?>