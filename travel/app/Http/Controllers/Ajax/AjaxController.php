<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Binhluan;
use App\Phieudat;
use App\Hoadon;
use App\Chitiettour;
use App\Diadiem;
class AjaxController extends Controller
{
	public function __construct(Binhluan $objmBinhluan, Phieudat $objmPhieudat, Hoadon $objmHoadon,Chitiettour $objmChitiettour, Diadiem $objmDiadiem){
		$this->objmBinhluan = $objmBinhluan;
        $this->objmPhieudat = $objmPhieudat;
        $this->objmHoadon = $objmHoadon;
        $this->objmChitiettour = $objmChitiettour;
        $this->objmDiadiem = $objmDiadiem;
	}
	//ajax duyệt bình luận
    public function xlactivebl(){
    	$id = $_REQUEST['aid'];
    	//echo $this->objmBinhluan->getItem($id)->trangthai;die();
    	//kiểm tra trạng thái bằng gì
    	if($this->objmBinhluan->getItem($id)->trangthai==1){
    		$this->objmBinhluan->cNTTBL($id,0);
    		?>
    			<a onclick="return setActive(<?php echo $id ?>)" href="javascript:void(0)"><img src="/public/templates/admin/assets/img/disactive.png"/></a>
    		<?php
    	}else{
    		$this->objmBinhluan->cNTTBL($id,1);
    		?>
    		<a onclick="return setActive(<?php echo $id ?>)" href="javascript:void(0)"><img src="/public/templates/admin/assets/img/active.png"/></a>
    		<?php
    	}
    }
    //ajax duyệt phiếu đặt
    public function duyetpd(){
        $id = $_REQUEST['aid'];
        //kiểm tra trạng thái phiếu đặt để cập nhật hóa đơn. duyệt->hd. chưa duyệt tìm idpd trong hd để xóa.
        //echo $this->objmPhieudat->getIdPD($id)->trangthai;die();
        if($this->objmPhieudat->getIdPD($id)->trangthai==0){
            $thanhtien = $this->objmPhieudat->getIdPD($id)->thanhtien;
            $this->objmHoadon->add($id,$thanhtien);
            $this->objmPhieudat->cNXDPD($id,1);
            ?>
                <a onclick="return setActivexd(<?php echo $id ?>)" href="javascript:void(0)"><img src="/public/templates/admin/assets/img/active.png"/></a>
            <?php
        }else{
            $this->objmHoadon->delXD($id);
            $this->objmPhieudat->cNXDPD($id,0);
            ?>
            <a onclick="return setActivexd(<?php echo $id ?>)" href="javascript:void(0)"><img src="/public/templates/admin/assets/img/disactive.png"/></a>
            <?php
        }
    }
    //tình trạng hủy của phiếu đặt
    public function huypd(){
        $id =  $_REQUEST['aid'];
        //echo $this->objmPhieudat->getIdPD($id)->huy;die();
        //nếu hủy phiếu đặt thì cộng thêm lại số lượng còn nếu chưa hủy thì trừ lại sô lượng
        if($this->objmPhieudat->getIdPD($id)->huy==0){
            $slhuy = $this->objmPhieudat->getIdPD($id)->soluongdat;
            $id_chitiet = $this->objmPhieudat->getIdPD($id)->id_chitiet;
            $this->objmChitiettour->cnslHuy($id_chitiet,$slhuy);
            $this->objmPhieudat->cNTTHuy($id,1);
            ?>
                <a onclick="return setActivehuy(<?php echo $id ?>)" href="javascript:void(0)"><img src="/public/templates/admin/assets/img/active.png"/></a>
            <?php
        }else{
            //nếu chưa hủy thì sô lượng còn trừ đi số lượng đặt
            $id_chitiet = $this->objmPhieudat->getIdPD($id)->id_chitiet;
            $slc = $this->objmChitiettour->getItem($id_chitiet)->soluongcon;
            $slhuy = $this->objmPhieudat->getIdPD($id)->soluongdat;
            $this->objmChitiettour->cnSLC($id_chitiet,$slc,$slhuy);
            $this->objmPhieudat->cNTTHuy($id,0);
            ?>
                <a onclick="return setActivehuy(<?php echo $id ?>)" href="javascript:void(0)"><img src="/public/templates/admin/assets/img/disactive.png"/></a>
            <?php
        }
    }
    //ajax duyệt tình trạng hóa đơn đã thanh toán hay chưa thanh toán
    public function duyethd(){
        $id = $_REQUEST['aid'];
        //echo $this->objmBinhluan->getItem($id)->trangthai;die();
        //kiểm tra trạng thái bằng gì
        if($this->objmHoadon->getItem($id)->tinhtrang==1){
            $this->objmHoadon->cNTT($id,0);
            ?>
                <a onclick="return setActive(<?php echo $id ?>)" href="javascript:void(0)"><img src="/public/templates/admin/assets/img/disactive.png"/></a>
            <?php
        }else{
            $this->objmHoadon->cNTT($id,1);
            ?>
            <a onclick="return setActive(<?php echo $id ?>)" href="javascript:void(0)"><img src="/public/templates/admin/assets/img/active.png"/></a>
            <?php
        }
    }
    //chọn tỉnh show ra địa điểm tương ứng
    public function xulydd(){
        $id =  $_REQUEST['aid'];
        $objItems = $this->objmDiadiem->getItemDd($id);
        foreach($objItems as $key => $objItem){
        ?>
                <option value="<?php echo  $objItem->id_dd ?>"><?php echo  $objItem->diemden ?></option>
        <?php
         }
    }

}
