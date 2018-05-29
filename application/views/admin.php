


      <div class="container" >
        <div class="row">

          <table class="table table-condensed table-responsive " style="direction: rtl; text-align: right; margin-top:100PX;">                                                                                                                    
            <thead>
              <tr>
                <th>عنوان خبر</th>
                <th>خلاصه</th>
                <th>دسته بندی</th>
                <th>تاریخ</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($news as $new) : ?>
                <tr>
                  <td><?php echo $new->title ?></td>
                  <td><?php echo substr($new->abstract , 0 , 130).'...'; ?></td>
                  <td><?php echo $new->category_id ?></td>
                  <td><?php echo $new->date ?></td>
                  <td>
                    <?php if($new->is_accepted   == false){ ?>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#approve_news<?php echo $new->news_id; ?>">بررسی</button>
                    <?php ;}  else { ?>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#edit_news<?php echo $new->news_id; ?>">ویرایش</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete_news<?php echo $new->news_id; ?>">حذف</button>
                    <?php ;} ?>
                  </td>
                </tr>

                <!-- remove news modal  -->
                <div class="modal fade" id="delete_news<?php echo $new->news_id; ?>" tabindex="-1" role="dialog"   aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>

                      </div>
                      <div class="modal-body">
                        <div class="alert alert-warning alert-danger"> آیا مطمینید می خواهید این خبر را از داده ها حذف کنید؟</div>
                      </div>
                      <form method="post" action="<?php echo base_url(); ?>index.php/Admin/removeNews">
                        <div class="form-group" style="margin-right: 10px;">
                          <input type="submit" class="btn btn-danger" value="بله حذف کن" name="remove_news_submit">
                          <input type="submit" class="btn btn-danger" value="خیر">   
                        </div>
                        <input type="hidden" name="news_id"  value="<?php echo $new->news_id; ?>">
                      </form> 
                    </div>
                  </div>
                </div>




                <!-- edit news modal -->
                <div class="modal fade" id="edit_news<?php echo $new->news_id; ?>" tabindex="-1" role="dialog"   aria-hidden="true">
                  <div class="modal-dialog" >
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>

                      </div>
                      <div class="modal-body">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="text-align: center">ویرایش خبر</h5>
                      </div>
                      <form style="margin-right: 10px; margin-left: 10px;" method="post" action="<?php echo base_url(); ?>index.php/Admin/editNews" >
                        <div class="form-group" style="margin-right: 10px;">
                          <label>عنوان خبر</label>
                          <input type="text" name="title" class="form-control" value="<?php echo $new->title; ?>">
                        </div>

                        <div class="form-group" style="margin-right: 10px;">
                          <label>خلاصه خبر</label>
                          <input type="text" name="abstract" class="form-control" value="<?php echo $new->abstract; ?>">
                        </div>

                        <div class="form-group" style="margin-right: 10px;">
                        <label>دسته بندی</label>
                          <input type="number" name="category_id" class="form-control" value="<?php echo $new->category_id; ?>">
                        </div>

                        <div class="form-group" style="margin-right: 10px;">
                          <label>آپلود تصویر</label>
                          <input type="file" name="image" class="form-control">

                          <div class="form-group" style="margin-right: 10px;">
                            <br>
                            <label>متن خبر</label>
                            <textarea class="form-control" style="resize: none;min-height: 170px;" name="main_text"><?php echo $new->main_text; ?></textarea>
                              <div class="form-group" style="margin-right: 10px;">
                                <input type="submit" class="btn btn-secondary" style="background-color:#29629a; margin-top:15px;" value="ویرایش"  name="edit_news_submit">
                                <input type="hidden" name="news_id"  value="<?php echo $new->news_id; ?>">
                              </div>
                            </div>  
                          </div>  
                        </form> 
                      </div>  
                    </div> 
                </div>  




                      <!-- approve news modal -->
        <div class="modal fade" id="approve_news<?php echo $new->news_id; ?>" tabindex="-1" role="dialog"   aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <!--<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>-->

              </div>

              <div class="modal-body">
                <!-- / address/ news-> img --> 

                <h5 class="modal-title" id="exampleModalLongTitle" style="text-align: center"><?php echo $new->title; ?></h5>  <!-- news-> title--> 
                <img src="assets/images/news.JPG" width:"60" height="60">
                <p><?php echo $new->main_text; ?></p>
                </div>
                <!--<div class="modal-footer">-->
                <form method="post" action="<?php echo base_url(); ?>index.php/Admin/approveNews" >
                  <div class="form-group" style="margin-right: 10px;">
                    <input type="submit" class="btn btn-secondary" name="aprrove_news_submit" style="background-color:#29629a;" value="تایید خبر" >
                    <!--  delete bara inke fargh bokone ba remove  -->    
                    <input type="submit" class="btn btn-secondary" name="delete_news_submit" style="background-color:#29629a;" value="پاک کردن">
                  </div>
                  <input type="hidden" name="news_id"  value="<?php echo $new->news_id; ?>">
                </form> 
                 
              </div>    

            </div>
          </div>



                <?php  endforeach; ?>
              </tbody>
            </table>

          </div>
        </div>




        <div class="row add_news_button" >
          <div >
            <button class="btn btn-success " data-toggle="modal" data-target="#add_news" style="font-size: 25px;">افزودن خبر</button>
          </div>

          <div class="modal fade" id="add_news" role="dialog" aria-hidden="true" style="display: none; ">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content" style="text-align: right;">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h4 class="modal-title">افزودن دسته بندی</h4>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url(); ?>index.php/Admin/addNews">
                    <div class="form-group">
                      <label>عنوان خبر</label>
                      <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>آپلود تصویر</label>
                      <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>خلاصه خبر</label>
                      <input type="text" name="abstract" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>دسته بندی</label>
                      <input type="number" name="category_id" class="form-control">
                    </div>  
                    <div class="form-group">
                      <label>متن خبر</label>
                      <textarea class="form-control" style="resize: none;min-height: 170px;" name="main_text"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="form-control" value="افزودن" name="add_news_submit">
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>

  <!-- 
        <div class="row add_news_button" >
          <div >
            <button class="btn btn-success " data-toggle="modal" data-target="#sortـid" style="font-size: 25px;">مرتب سازی</button>
          </div>
          <div class="modal fade" id="sortـid" tabindex="-1" role="dialog"   aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>

                      </div>
                      <div class="modal-body">  
                        <div class="alert  alert-warning "> نوع مرتب سازی را انتخاب کنید</div>
                      </div>
                      <form method="post" action="<?php echo base_url(); ?>index.php/Admin/sortNews">
                        <div class="form-group" style="margin-right: 10px;">
                          <input type="submit" class="btn btn-danger" value="صعودی" name="asc" >
                          <input type="submit" class="btn btn-danger" value="نزولی" name="desc">   
                        </div>
                      </form> 
                    </div>
                  </div>
                </div>
        </div> -->



