<?php 

class Company {

    public $name;
    public $location;
    public $tot_employees = 0;
    public $daily_expense;
    public static $tot_expense = 0; // Totale spese giornaliere di tutte le aziende

    public function __construct($nome, $luogo, $dipendenti, $spesa) {
        $this->name = $nome;
        $this->location = $luogo;
        $this->tot_employees = $dipendenti; 
        $this->daily_expense = $spesa; 

        // Aggiunge la spesa giornaliera dell'azienda al totale delle spese giornaliere di tutte le aziende
        self::$tot_expense += $spesa;
    }

    // Metodo per contare e stampare il numero di dipendenti
    public function countEmployees() {
        if ($this->tot_employees > 0) {
            echo "L'ufficio $this->name con sede in $this->location ha ben $this->tot_employees dipendenti.\n";
        } else {
            echo "L'ufficio $this->name con sede in $this->location non ha dipendenti.\n";
        }      
    }

    // Metodo per calcolare e stampare la spesa annuale di una singola azienda
    public function annualExpense() {
        $annualExpense = $this->daily_expense * 365;
        echo "L'ufficio $this->name con sede in $this->location ha una spesa annuale di $annualExpense euro.\n";
    }

    // Metodo statico per calcolare e stampare l’insieme totale delle spese annuali di tutte le aziende
    public static function totalCompanyExpense() {
        $expenseTotCompany = self::$tot_expense * 365;
        echo "L'insieme totale delle spese di tutte le aziende è di $expenseTotCompany euro.\n";
    }

    // Metodo statico che richiama il totale delle spese
    public static function absoluteTot() {
        self::totalCompanyExpense();    
    }
}

// Creazione di 5 aziende
$company_1 = new Company('LaserLab', 'San Giovanni Rotondo', 4, 150);
$company_2 = new Company('Axia', 'Rimini', 20, 356);
$company_3 = new Company('Eurix', 'Roma', 9, 1456.8);
$company_4 = new Company('CallGo', 'Bologna', 50, 453.98);
$company_5 = new Company('UmbertoUmberto', 'Livorno', 0, 100.87);

// Test dei metodi
$company_1->countEmployees();
$company_2->countEmployees();
$company_3->annualExpense();
$company_4->annualExpense();
$company_5->countEmployees();

// Calcolo del totale delle spese annuali di tutte le aziende
Company::absoluteTot();
