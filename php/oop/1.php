<?php


class Date
{
  	private $date;
    public function __construct($date = null)
    {
      	$this->date = date_create($date);
//        $this->day = date_format($this->date, 'd');
//        $this->month = date_format($this->date, 'm');
//        $this->year = date_format($this->date, 'Y');
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

$one = new Date;
$one->addDay(1);
echo $one->getWeekDay('ru');