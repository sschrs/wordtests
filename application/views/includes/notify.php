<script>
    $(document).ready(function () {
        <?php
            $alert = $this->session->userdata("alert");
            if ($alert){ ?>
                iziToast.show({
                    title: '<?php echo $alert["title"] ?>',
                    message: '<?php echo $alert['message'] ?>',
                    position : "<?php echo $alert["position"] ?>",
                    backgroundColor : '<?php echo $alert['bgColor'] ?>',
                    titleColor: '<?php echo $alert["color"] ?>',
                    messageColor: '<?php echo $alert["color"] ?>',
                });
            <?php } ?>
            <?php
            $deleteAlert = $this->session->userdata("deleteAlert");
            if ($deleteAlert){ ?>
            iziToast.question({
                timeout: 20000,
                close: false,
                overlay: true,
                displayMode: 'once',
                id: 'question',
                zindex: 999,
                title: 'Hey',
                message: 'Bu kaydı silmek istediğinden emin misin?',
                position: 'center',
                buttons: [
                    ['<button><b>Evet</b></button>', function (instance, toast) {
                        window.location.href = "<?php echo base_url("lists/delete/$deleteAlert") ?>"
                    }, true],
                    ['<button>Hayır</button>', function (instance, toast) {

                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                    }],
                ],
                onClosing: function(instance, toast, closedBy){
                    console.info('Closing | closedBy: ' + closedBy);
                },
                onClosed: function(instance, toast, closedBy){
                    console.info('Closed | closedBy: ' + closedBy);
                }
            });
        <?php } ?>

        <?php
        $deleteAlertWords = $this->session->userdata("deleteAlertWords");
        if ($deleteAlertWords){ ?>
        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Hey',
            message: 'Bu kaydı silmek istediğinden emin misin?',
            position: 'center',
            buttons: [
                ['<button><b>Evet</b></button>', function (instance, toast) {
                    window.location.href = "<?php echo base_url("words/delete/$deleteAlertWords->id/$deleteAlertWords->idPage") ?>"
                }, true],
                ['<button>Hayır</button>', function (instance, toast) {

                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                }],
            ],
            onClosing: function(instance, toast, closedBy){
                console.info('Closing | closedBy: ' + closedBy);
            },
            onClosed: function(instance, toast, closedBy){
                console.info('Closed | closedBy: ' + closedBy);
            }
        });
        <?php } ?>



        <?php
        $deleteAlertWords = $this->session->userdata("deleteAlertWords2");
        if ($deleteAlertWords){ ?>
        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Hey',
            message: 'Bu kaydı silmek istediğinden emin misin?',
            position: 'center',
            buttons: [
                ['<button><b>Evet</b></button>', function (instance, toast) {
                    window.location.href = "<?php echo base_url("words/delete_words/$deleteAlertWords->id") ?>"
                }, true],
                ['<button>Hayır</button>', function (instance, toast) {

                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                }],
            ],
            onClosing: function(instance, toast, closedBy){
                console.info('Closing | closedBy: ' + closedBy);
            },
            onClosed: function(instance, toast, closedBy){
                console.info('Closed | closedBy: ' + closedBy);
            }
        });
        <?php } ?>
    })
</script>