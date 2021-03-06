<form method="post" action="" name="account_form" enctype="multipart/form-data"> 
    <div class="group">
        <div class="categories">
            <?php 
                if (isset($list_cate) && $list_cate != NULL) {
                  $system = new recursive($list_cate);
                  $result = $system->buildArray();
                  $attr   = array('size'=> 15, 'style'=> 'width: 450px');
                  $select = createSelectForProduct('cate_id', $product['cate_id'], $result, $attr);
                  echo $select;
                }
            ?>
            <?php echo form_error('cate_id'); ?>
        </div>

        <div class="infobasic">
            <?php if (!empty($listhsx)): ?>
                <div class="label">Chọn hãng sản xuất</div>
                <select id="bachnx_change" name="hangsanxuat_id">
                    <option value="">Chọn hãng sản xuất</option>
                    <?php foreach($listhsx as $v): ?>
                    <option value="<?php echo $v['hangsanxuat_id'] ?>" <?php echo $product['hangsanxuat_id'] == $v['hangsanxuat_id'] ? 'selected' : ''; ?>><?php echo $v['hangsanxuat_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>

            <div class="label">Tên sản phẩm</div>
            <div>
                <input type="text" value="<?php echo $product['pro_name']; ?>" size="70" name="pro_name" id="pro_name" class="name-title" />
                <?php echo form_error('pro_name'); ?>
            </div>

            <div class="label">URL Rewrite</div>
            <div>
                <input type="text" value="<?php echo $product['pro_name_rewrite']; ?>" size="70" name="pro_name_rewrite" id="pro_name_rewrite" class="name-rewrite">
                <?php echo form_error('pro_name_rewrite'); ?>
            </div>

            <div class="label">Giá bán</div>
            <div>
                <input type="text" name="pro_price" value="<?php echo $product['pro_price']; ?>" />  VNĐ
                <?php echo form_error('pro_price'); ?>
            </div>

            <div class="label">Bảo hành</div>
            <div>
                <input type="text" name="pro_war" value="<?php echo $product['pro_war']; ?>" />
            </div>

            <div class="label">Meta Keyword</div>
            <div>
                <textarea name="pro_key" class="meta_desc" style="width: 600px; resize: none; height: 50px; padding-left: 5px;"  id="pro_key"><?php echo $product['pro_key']; ?></textarea>
            </div>

            <div class="label">Meta Description</div>
            <div>
                <textarea name="pro_des" id="pro_des" class="meta_desc" style="width: 600px; resize: none;  height: 50px; padding-left: 5px;"><?php echo $product['pro_des']; ?></textarea>
            </div>

            <div class="label">Video sản phẩm</div>
            <div>
                <input type="text" name="video" value="<?php echo htmlentities($product['video_youtube']); ?>" />
            </div>
        </div>

        <h3>Thông tin mô tả sản phẩm</h3>
        <?php
            $pro_info = $product['pro_info'];
            $fck = new FCKeditor('pro_info');
            $fck->BasePath = sBASEPATH;
            $fck->Value  = $pro_info;
            $fck->Width  = '100%';
            $fck->Height = 350;
            $fck->Create();
        ?>
                
        <h3>Thông tin chi tiết sản phẩm</h3>
        <?php 
            $pro_full = $product['pro_full'];
            $fck = new FCKeditor('pro_full');
            $fck->BasePath = sBASEPATH;
            $fck->Value  = $pro_full;
            $fck->Width  = '100%';
            $fck->Height = 350;
            $fck->Create();
        ?>

        <h3>Thông tin phụ kiện</h3>
        <?php
            $phukien = $product['phukien'];
            $fck = new FCKeditor('phukien');
            $fck->BasePath = sBASEPATH;
            $fck->Value  = $phukien;
            $fck->Width  = '100%';
            $fck->Height = 350;
            $fck->Create();
        ?>
        
        <h3>Hình ảnh sản phẩm</h3>
        <input type="file" name="image[]" id="filesToUpload" multiple />
        <p style="font-size:14px; color:#F00"><b>Chú ý:</b> Bạn có thể chọn nhiều ảnh cùng 1 lúc. Chấp nhận các file ảnh: gif, jpg, png</p><br />
        <p>
            <?php
                @$images = unserialize($product['pro_images']);
                if(isset($images) && $images != NULL){
                    foreach($images as $value){
                        echo "<img style='max-width:100px;max-height:70px;margin-right:5px;' src='".base_url()."uploads/products/thumb/".$value."' />";
                    }
                }
            ?>
        </p>
        <div class="group-actions" style="text-align: center;">
            <input class="btn btn_submit_bachnx" name="ok" id="ok" type="submit" value="Lưu lại">
        </div>
    </div>    
</form>

<style>
    .group {
        background: #FFF;
         border: none; 
         margin: 0px 0px; 
        border-radius: 0px;
        max-width: 100%;
    }
    select { padding: 5px; width: 250px;}

    .infobasic {
        display: inline-block;
        width: 700px;
        min-height: 200px;
    }
    
    .categories {
        display: inline-block;
        width: 500px;
        min-height: 200px;
        float: left;
    }

    .label{
        font-size: 12px;
        padding: 8px 0px 8px 0px;
        font-weight: bold;
    }

    input[type='text'] {
        padding: 5px;
        width: 600px;
    }
    #category_list {
        width: 480px;
        height: 500px;
    }

    #category_list option {
        font-size: 14px;
        line-height: 28px;
    }
    h3{
        text-indent: 5px;
    }

    select#cate_id option {
        font-size: 13px;
        height: 20px;
        line-height: 20px;
        display: block;
        vertical-align: middle;
    }
</style>