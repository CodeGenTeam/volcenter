<?php // тут начинаются строки которые я нагло скопипастил и немного подредактировал. Сурс http://phpfaq.ru/calendar
$month_names = ["январь", "февраль", "март", "апрель", "май", "июнь", "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь"];
if (isset($_GET['y'])) $y = $_GET['y'];
if (isset($_GET['m'])) $m = $_GET['m'];
if (isset($_GET['date']) AND strstr($_GET['date'], "-")) list($y, $m) = explode("-", $_GET['date']);
if (!isset($y) OR $y < 1970 OR $y > 2037) $y = date("Y");
if (!isset($m) OR $m < 1 OR $m > 12) $m = date("m");

$month_stamp = mktime(0, 0, 0, $m, 1, $y);
$day_count = date("t", $month_stamp);
$weekday = date("w", $month_stamp);
if ($weekday == 0) $weekday = 7;
$start = -($weekday - 2);
$last = ($day_count + $weekday - 1) % 7;
if ($last == 0) $end = $day_count; else $end = $day_count + 7 - $last;
$i = 0;
?>
<div class="cal panel panel-primary">
    <div class="panel-heading">Календарь мероприятий</div>
    <div class="panel-body">
        <p class="text-center month-picker">
                <span class="pull-left">
                    <a href="{!! date('?\m=m&\y=Y', mktime(0, 0, 0, $m - 1, 1, $y)) !!}"><i
                                class="glyphicon glyphicon glyphicon-chevron-left"></i></a>
                </span>
            {{ $month_names[$m - 1] . " " . $y }}
            <span class="pull-right">
                    <a href="{!! date('?\m=m&\y=Y', mktime(0, 0, 0, $m + 1, 1, $y)) !!}"><i
                                class="glyphicon glyphicon glyphicon-chevron-right"></i></a>
                </span>
        </p>
        <table class="table">
            <thead>
            <tr>
                <td>Пн</td>
                <td>Вт</td>
                <td>Ср</td>
                <td>Чт</td>
                <td>Пт</td>
                <td>Сб</td>
                <td>Вс</td>
            </tr>
            </thead>
            <tbody>
            @for ($d = $start; $d <= $end; $d++)
                @if (!($i++ % 7))
                    <tr>
                        @endif
                        @if ($d < 1 || $d > $day_count)
                            <td><span>&nbsp;</span></td>
                        @else
                            <td><a href="?date={{ $y }}-{{ $m }}-{{ $d }}">{{ $d }}</a></td>
                        @endif
                        @if (!($i % 7))
                    </tr>
                @endif
            @endfor
            </tbody>
        </table>
    </div>
</div>
