<div class="form-example-wrap">
    <div class="cmp-tb-hd">
        <h2>Yeni Liste Oluştur</h2>
        <small>Almanca, Fransızca gibi  "Artikel" yapısına sahip ve çoğul halleri düzensiz olan diller için liste eklerken Artikel ve Plural gibi alanları kullanmak isteyebilirsiniz.</small>
    </div>
    <form action="<?php echo base_url("lists/update/$list->id") ?>" method="post">
        <div class="form-example-int">
            <div class="form-group">
                <label>Liste Başlığı</label>
                <div class="nk-int-st">
                    <input type="text" class="form-control input-sm" value="<?php echo $list->title ?>" name="title" placeholder="Örn: Almanca Ekonomi Terimleri">
                </div>
            </div>
        </div>
        <div class="form-example-int mg-t-15">
            <div class="form-group">
                <label>Birincil Dil</label>
                <div class="nk-int-st">
                    <input type="text" class="form-control input-sm" value="<?php echo $list->langFirst ?>" name="firstLang" placeholder="Örn: Almanca">
                </div>
            </div>
        </div>
        <div class="form-example-int mg-t-15">
            <div class="form-group">
                <label>İkincil Dil</label>
                <div class="nk-int-st">
                    <input type="text" class="form-control input-sm" value="<?php echo $list->langSecond ?>" name="secondLang" placeholder="Örn: İngilizce">
                </div>
            </div>
        </div>
        <div class="form-example-int mg-t-15">
            <div class="fm-checkbox">
                <label><input type="checkbox" <?php echo ($list->artikel == 1) ? "checked" : "" ?> value="1" name="artikel" class="i-checks"> <i></i>Artikel Alanı Ekle</label>
            </div>
            <div class="fm-checkbox">
                <label><input type="checkbox" <?php echo ($list->plural == 1) ? "checked" : "" ?> value="1" name="plural" class="i-checks"> <i></i>Plural Alanı Ekle</label>
            </div>
        </div>
        <div class="form-example-int mg-t-15">
            <button type="submit" class="btn btn-success notika-btn-success">Oluştur</button>
            <a href="<?php echo base_url("lists") ?>" class="btn btn-warning notika-btn-warning">İptal</a>
        </div>
    </form>
</div>