var checknum = '';
var uid = '';
var qu = $('#qu').val();
$('#checknum').change(function() {
    checknum = $(this).val();
});
  $('#uid').change(function(){
	  uid=$.trim($(this).val());
  });
  $('#qu').change(function(){
	  qu=$.trim($(this).val());
  });
$(".selectpicker").selectpicker({
    header:'Mời lựa chọn',
    showIcon:true,
    multipleSeparator:'#',
    maxOptions:4,
    maxOptionsText:'Chọn tối đa 4',
});

/**
角色充值
*/
function chargebtn() {
	  var id=$('#id').val();
	  if(id==''){
		  layer.msg('Tên đăng nhập không thể trống!');
		  return false;
	  }
	  var wmoney=$('#wmoney').val();
	  if(wmoney==''){
		  layer.msg('Số tiền không thể trống!');
		  return false;
	  }	 
	$.ajaxSetup({
		contentType: "application/x-www-form-urlencoded; charset=utf-8"
	});
	$.post("user/wmoneyquery.php", {
		type:'charge',id:id,wmoney:wmoney	
	},
	function(data) {
		//console.log('data',data);
		layer.msg(data);
		
	});
}
/**
发道具邮件
*/
function themcongnhan() {
		  var macongnhan=$('#macongnhan').val();
	  if(macongnhan==''){
		  layer.msg('Nhập mã công nhân');
		  return false;
	  }
	  var code=$('#code').val();
	  if(code==''){
		  layer.msg('Vui lòng nhập mã GIFT CODE muốn tạo');
		  return false;
	  }
	  var mailid=$('#mailid').val();
	  if(mailid==''){
		  layer.msg('Vui lòng chọn mục 1 !');
		  return false;
	  }
	  var mailnum=$('#mailnum').val();
	  if(mailnum=='' || isNaN(mailnum)){
		  layer.msg('Số lượng 1 không thể trống!');
		  return false;
	  }
	  if(mailnum<1 || mailnum>100000){
		  layer.msg('Số lượng 1 từ:1-100000');
		  return false;
	  }
	  var mailid2=$('#mailid2').val();
	  if(mailid2==''){
		  layer.msg('Vui lòng chọn một mục 2!');
		  return false;
	  }
	  var mailnum2=$('#mailnum2').val();
	  if(mailnum2=='' || isNaN(mailnum2)){
		  layer.msg('Số lượng 2 không thể trống!');
		  return false;
	  }
	  if(mailnum2<1 || mailnum2>100000){
		  layer.msg('Số lượng 2 từ:1-100000');
		  return false;
	  }
	  var mailid3=$('#mailid3').val();
	  if(mailid3==''){
		  layer.msg('Vui lòng chọn một mục 3!');
		  return false;
	  }
	  var mailnum3=$('#mailnum3').val();
	  if(mailnum3=='' || isNaN(mailnum3)){
		  layer.msg('Số lượng 3 không thể trống!');
		  return false;
	  }
	  if(mailnum3<1 || mailnum3>100000){
		  layer.msg('Số lượng 3 từ:1-100000');
		  return false;
	  }
	  var mailid4=$('#mailid4').val();
	  if(mailid4==''){
		  layer.msg('Vui lòng chọn một mục 4!');
		  return false;
	  }
	  var mailnum4=$('#mailnum4').val();
	  if(mailnum4=='' || isNaN(mailnum4)){
		  layer.msg('Số lượng 4 không thể trống!');
		  return false;
	  }
	  if(mailnum4<1 || mailnum4>100000){
		  layer.msg('Số lượng 4 từ:1-100000');
		  return false;
	  }
	$.ajaxSetup({
		contentType: "application/x-www-form-urlencoded; charset=utf-8"
	});
	$.post("user/gcquery.php", {
		type:'daoju',code:code,item:mailid,num:mailnum,macongnhan:macongnhan,item2:mailid2,num2:mailnum2,item3:mailid3,num3:mailnum3,item4:mailid4,num4:mailnum4
	},
	function(data) {
		layer.msg(data);
		
	});
	
}
function shouquanbtn() {
	if (checknum == '') {
        layer.msg('Vui lòng nhập mã GM!');
        return false;
    }
	  if(uid==''){
		  layer.msg('ID nhân vật không thể trống!');
		  return false;
	  }
	  var pwd = $('#pwd').val();
	  if(pwd==''){
		  layer.msg('Mật khẩu ủy quyền không thể trống!');
		  return false;
	  }	 
	$.ajaxSetup({
		contentType: "application/x-www-form-urlencoded; charset=utf-8"
	});
	$.post("user/gmquery.php", {
		type:'addczvip',uid:uid,pwd:pwd,qu:qu,checknum:checknum		
	},
	function(data) {
		//console.log('data',data);
		layer.msg(data);
		
	});
}
function shouquanbtn1() {
	if (checknum == '') {
        layer.msg('Vui lòng nhập mã GM!');
        return false;
    }
	  if(uid==''){
		  layer.msg('ID nhân vật không thể trống!');
		  return false;
	  }
	  var pwd = $('#pwd').val();
	  if(pwd==''){
		  layer.msg('Mật khẩu ủy quyền không thể trống!');
		  return false;
	  }	 
	$.ajaxSetup({
		contentType: "application/x-www-form-urlencoded; charset=utf-8"
	});
	$.post("user/gmquery.php", {
		type:'addvip',uid:uid,pwd:pwd,qu:qu,checknum:checknum		
	},
	function(data) {
		//console.log('data',data);
		layer.msg(data);
		
	});
}
function unshouquan() {
	if (checknum == '') {
        layer.msg('Vui lòng nhập mã GM!');
        return false;
    }
	  if(uid==''){
		  layer.msg('ID nhân vật không thể trống!');
		  return false;
	  }
	$.ajaxSetup({
		contentType: "application/x-www-form-urlencoded; charset=utf-8"
	});
	$.post("user/gmquery.php", {
		type:'quxiaovip',uid:uid,qu:qu,checknum:checknum		
	},
	function(data) {
		//console.log('data',data);
		layer.msg(data);
		
	});
}
function shuoming() {
    layer.open({
    content: 'Mô tả: </br>1.Tên nhân vật </br> 2.Số lượng bưu kiện không nên quá nhiều </br> 3.Vấn đề thư không quan tâm'
    ,btn: 'Đã hiểu'
  });
}