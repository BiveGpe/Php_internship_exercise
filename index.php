<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>internship exercise</title>
</head>
<body>
    <h1>Top 10 imion</h1>

    <?php
        #Zdefiniowanie tablic
        $table_name = array();
        $table_date = array();

        #Wczytanie tablicy
        $table1 = explode(",", implode(',', file('php_internship_data.csv')));
        
        #Tworze dwie tablice - Z imionami i z Datą urodzenia
        for($i = 0; $i < count($table1); $i++)
        {
            if($i % 2 == 0)
            {
                $table_name[] = $table1[$i];
            }
            else
            {
                $table_date[] = $table1[$i];
            }
        }   

        #Policzyć i posortowac imiona
        $count_name = array_count_values($table_name);
        arsort($count_name);

        #Pokazać Top 10 imion
        $i = 0;
        foreach($count_name as $key => $data)
        {
            $imie = ucfirst(strtolower($key));
            echo $i ." Name: " . $imie . ", Number of repeats: " . $data . "<br>";
            $i++;
            if($i == 10)
            {
                break;
            }
        }

        #Zadanie dodatkowe
        echo "<h1> Top 10 dat urodzenia </h1>";

        #Posortowanie i policzenie wartości
        $count_date = array_count_values($table_date);
        arsort($count_date);

        #Pokazanie Top 10 dat
        $i = 0;
        foreach($count_date as $key => $data)
        {

            if($key >="2000-01-01")
            {
                $date = str_replace('-','.', date("d-m-Y", strtotime($key))); #Zmiana formatu daty
                
                echo $i ." Date: " . $date . ", Number of repeats: " . $data . "<br>";
                $i++;

                if($i == 10)
                {
                    break;
                }
            }
        }
    ?>

</body>
</html>