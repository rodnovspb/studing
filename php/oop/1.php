<?php


class Date1
{
  	public $date;
    public function __construct($date = null)
    {
      	$this->date = date_create($date);
    }

    public function getDay()
    {
		return date_format($this->date, 'd');
    }

    public function getMonth($lang = null)
    {
        $monthsRu = [1 => 'Январь' , 'Февраль' , 'Март' , 'Апрель' , 'Май' , 'Июнь' , 'Июль' , 'Август' , 'Сентябрь'
		, 'Октябрь' , 'Ноябрь' , 'Декабрь' ];
        if($lang==='ru'){
          return $monthsRu[(int)(date_format($this->date, 'm'))];
		} elseif ($lang==='en') {
          return date_format($this->date, 'F');
		} else {
          return date_format($this->date, 'm');
		}
    }

    public function getYear()
    {
      return date_format($this->date, 'Y');
    }

    public function getWeekDay($lang = null)
    {

 		 $weekDay = [ 'Воскресенье', 'Понедельник' , 'Вторник' , 'Среда' , 'Четверг' , 'Пятница' , 'Суббота'];
 		 switch ($lang) {
			 case 'ru': $day = $weekDay[(int)(date_format($this->date, 'w'))];
			 break;
			 case 'en': $day = date_format($this->date, 'l');
			 break;
			 default: $day = date_format($this->date, 'w');
		 }
		 return $day;

    }

    public function addDay($value)
    {
        date_modify($this->date, "$value day");
        return $this;
    }

    public function subDay($value)
    {
        date_modify($this->date, "-$value day");
        return $this;
    }

    public function addMonth($value)
    {
        date_modify($this->date, "$value month");
        return $this;
    }

    public function subMonth($value)
    {
        date_modify($this->date, "-$value month");
        return $this;
    }

    public function addYear($value)
    {
        date_modify($this->date, "$value year");
        return $this;
    }

    public function subYear($value)
    {
        date_modify($this->date, "-$value year");
        return $this;
    }

    public function format($format)
    {
        return date_format($this->date, $format);
    }

    public function __toString()
    {
        return date_format($this->date, "Y-m-d");
    }


}

class Interval {
    public $date1;
    public $date2;
    public $diff;
    public function __construct(Date1 $date1, Date1 $date2)
    {
        $this->date1 = strtotime((string)$date1);
        $this->date2 = strtotime((string)$date2);
        $this->diff = $this->date2 - $this->date1;
    }
    public function toDays()
    {
        return round($this->diff/60/60/24, 2) . "суток";
    }

    public function toMonths()
    {
        return round($this->diff/60/60/24/30,2) . 'месяцев';
    }

    public function toYears()
    {
        return round($this->diff/60/60/24/30/12, 2) . 'лет';
    }
}

$one = new Date1('2021-04-9');
$two = new Date1();

echo '<pre>';
print_r($two->date);
echo '</pre>';


$int = new Interval($one, $two);

echo '<pre>';
print_r($int->toDays());
echo '<br>';
print_r($int->toMonths());
echo '<br>';
print_r($int->toYears());
echo '</pre>';