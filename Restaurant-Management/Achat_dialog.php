     <div  id="imageModal" class="modal fade" role="dialog">
         <div class="modal-dialog" style="background-color: #ffd69b;">
          <div class="modal-content" style="background-color: #ffd69b;">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
             <form id="image_form" method="post" enctype="multipart/form-data">
             <input type="hidden" name="action" id="action" value="insert" />
             <input type="hidden" name="image_id" id="image_id" />
                  <div style="margin: 10px;"  >
                    <div class="container" >
<!-------------------------------->
                        <div class="row">
                            <div class="col-md-6 text-right" style="padding: 10px;"><label class="col-form-label" style="font-family: 'Baloo Bhaijaan', cursive;font-size: 16px;background-color: rgba(0,0,0,0.2);padding: 9px;">اسم الوحدة</label></div>
                            <div class="col-md-6 text-left" style="padding: 12px;"><input type="text" style="height: 40px;" id="product_id"></div>
                        </div>
                    </div>
                </div>
<!-------------------------------->
                <div style="margin: 10px;">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-6 text-right" style="padding: 10px;"><label class="col-form-label" style="font-family: 'Baloo Bhaijaan', cursive;font-size: 17px;background-color: rgba(0,0,0,0.2);padding: 9px;">التاريخ</label></div>
                            <div class="col-md-6 text-left" style="padding: 12px;"><input type="date" style="height: 40px;" id="date_id"></div>
                        </div>
                    </div>
                </div>
<!-------------------------------->
    <div style="margin: 10px;">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-6 text-right" style="padding: 10px;"><label class="col-form-label" style="font-family: 'Baloo Bhaijaan', cursive;font-size: 17px;background-color: rgba(0,0,0,0.2);padding: 9px;">السعر</label></div>
                            <div class="col-md-6 text-left" style="padding: 12px;"><input type="text" style="height: 40px;" id="prix_id"></div>
                        </div>
                    </div>
                </div>
      
<!-------------------------------->
                 <div class="col text-center">
                  <button class="btn btn-primary bg-danger" type="button" class="btn btn-default" data-dismiss="modal" style="font-family: 'Baloo Bhaijaan', cursive;margin-left: 25px;">الغاء</button>
                  <button class="btn btn-primary bg-success" type="submit" name="insert" id="insert" value="Insert" style="margin: 15px;font-family: 'Baloo Bhaijaan', cursive;" >إضافة</button></div>
            </form>
         </div>
          </div>
         </div>
    </div>