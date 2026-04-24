const Ajax = () => {
    jQuery(document).ready(function ($) {

        const button = $('.transfers__load-more');

        button.on('click', function () {

            let $this = $(this),
                parent = $this.parent(),
                paged = $this.data('paged'),
                max_paged = $this.data('max_paged'),
                post_type = $this.data('post_type'),
                service_ids = $this.data('service_ids'),
                current_post = $this.data('current_post'),
                type = $this.data('type');

            const response = parent.find('#' + post_type + '-response'),
                button_text = $this.text();

            console.log(parent);

            paged++;

            $.ajax({
                url: transfer_load_more.ajaxurl,
                data: {
                    paged: paged,
                    max_paged: max_paged,
                    type: type,
                    post_type: post_type,
                    current_post: current_post,
                    service_ids: service_ids,
                    action: 'transfer-load_more'
                },
                type: 'POST',
                beforeSend: function (xhr) {
                    $this.text('Loading...');
                },
                success: function (data) {
                    response.append(data['posts']);
                    $this.data('paged', data['paged']);
                    $this.text(button_text);

                    if (paged === max_paged) {
                        $this.hide();
                    }

                },
                error: function (data) {

                }
            });
            return false;

        });

    });
}

export default Ajax;
