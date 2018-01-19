<div id="metrika-widget">
    <form action="" id="metrika-form">
        <div class="input-daterange metrika-datepicker input-group" id="datepicker" data-callback="updateMetrika()">
            <input type="text" class="input-sm form-control" name="dateFrom" placeholder="Начало периода" value="<?=date("d.m.Y", strtotime("-1 week"));?>" >
            <span class="input-group-addon">до</span>
            <input type="text" class="input-sm form-control" name="dateTo" placeholder="Конец периода" value="<?=date("d.m.Y");?>">
        </div>
    </form>
    <canvas id="metrika-chart" class="width-100p" height="300" style=" height: 300px !important;"></canvas>
</div>

<script>
var metrika;

    $(document).ready(function() {
        if (typeof(Metrika) === "function"){
                console.log(typeof(metrika));

                metrika = new Metrika();
                metrika.init();
        }

        $('.metrika-datepicker input').each(function() {
            $(this).bootstrapDatepicker({

                language: "ru",
                forceParse: $(this).data('parse') ? $(this).data('parse') : false,
                daysOfWeekDisabled: $(this).data('day-disabled') ? $(this).data('day-disabled') : "", // Disable 1 or various day. For monday and thursday: 1,3
                calendarWeeks: $(this).data('calendar-week') ? $(this).data('calendar-week') : false, // Display week number
                autoclose: $(this).data('autoclose') ? $(this).data('autoclose') : false,
                todayHighlight: $(this).data('today-highlight') ? $(this).data('today-highlight') : true, // Highlight today date
                toggleActive: $(this).data('toggle-active') ? $(this).data('toggle-active') : true, // Close other when open
                multidate: $(this).data('multidate') ? $(this).data('multidate') : false, // Allow to select various days
                orientation: $(this).data('orientation') ? $(this).data('orientation') : "top", // Allow to select various days,
                rtl: $('html').hasClass('rtl') ? true : false,
                format: "dd.mm.yyyy"

            }).on("hide", function(data) {

                metrika.timerUpdate = window.setTimeout(function() {
                    var dateFrom = $('#metrika-form input[name="dateFrom"]').val();
                    var dateTo = $('#metrika-form input[name="dateTo"]').val();

                    if (dateFrom == dateTo) return;
                    if (dateFrom.length == 0 || dateTo.length == 0) return;
                    var form = $('#metrika-form').serialize();
                    blockUI($("#metrika-widget"));

                    metrika.update(form);
                }, 100)
            }).on("show", function() {
                clearInterval(metrika.timerUpdate);
            });
        })


    })
</script>