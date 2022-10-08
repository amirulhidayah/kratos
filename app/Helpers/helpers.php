<?php

use Carbon\Carbon;

function bbu($usiaBulan, $jenisKelamin, $beratBadan)
{
    if ($jenisKelamin == "Laki-Laki") {
        if ($usiaBulan == 0) {
            $median = 3.3;
            $sd = 2.9;
            $sd1 = 3.9;
        } else if ($usiaBulan == 1) {
            $median = 4.5;
            $sd = 3.9;
            $sd1 = 5.1;
        } else if ($usiaBulan == 2) {
            $median = 5.6;
            $sd = 4.9;
            $sd1 = 6.3;
        } else if ($usiaBulan == 3) {
            $median = 6.4;
            $sd = 5.7;
            $sd1 = 7.2;
        } else if ($usiaBulan == 4) {
            $median = 7.0;
            $sd = 6.2;
            $sd1 = 7.8;
        } else if ($usiaBulan == 5) {
            $median = 7.5;
            $sd = 6.7;
            $sd1 = 8.4;
        } else if ($usiaBulan == 6) {
            $median = 7.9;
            $sd = 7.1;
            $sd1 = 8.8;
        } else if ($usiaBulan == 7) {
            $median = 8.3;
            $sd = 7.4;
            $sd1 = 9.2;
        } else if ($usiaBulan == 8) {
            $median = 8.6;
            $sd = 7.7;
            $sd1 = 9.6;
        } else if ($usiaBulan == 9) {
            $median = 8.9;
            $sd = 8.0;
            $sd1 = 9.9;
        } else if ($usiaBulan == 10) {
            $median = 9.2;
            $sd = 8.2;
            $sd1 = 10.2;
        } else if ($usiaBulan == 11) {
            $median = 9.4;
            $sd = 8.4;
            $sd1 = 10.5;
        } else if ($usiaBulan == 12) {
            $median = 9.6;
            $sd = 8.6;
            $sd1 = 10.8;
        } else if ($usiaBulan == 13) {
            $median = 9.9;
            $sd = 8.8;
            $sd1 = 11.0;
        } else if ($usiaBulan == 14) {
            $median = 10.1;
            $sd = 9.0;
            $sd1 = 11.3;
        } else if ($usiaBulan == 15) {
            $median = 10.3;
            $sd = 9.2;
            $sd1 = 11.5;
        } else if ($usiaBulan == 16) {
            $median = 10.5;
            $sd = 9.4;
            $sd1 = 11.7;
        } else if ($usiaBulan == 17) {
            $median = 10.7;
            $sd = 9.6;
            $sd1 = 12.0;
        } else if ($usiaBulan == 18) {
            $median = 10.9;
            $sd = 9.8;
            $sd1 = 12.2;
        } else if ($usiaBulan == 19) {
            $median = 11.1;
            $sd = 10.0;
            $sd1 = 12.5;
        } else if ($usiaBulan == 20) {
            $median = 11.3;
            $sd = 10.1;
            $sd1 = 12.7;
        } else if ($usiaBulan == 21) {
            $median = 11.5;
            $sd = 10.3;
            $sd1 = 12.9;
        } else if ($usiaBulan == 22) {
            $median = 11.8;
            $sd = 10.5;
            $sd1 = 13.2;
        } else if ($usiaBulan == 23) {
            $median = 12.0;
            $sd = 10.7;
            $sd1 = 13.4;
        } else if ($usiaBulan == 24) {
            $median = 12.2;
            $sd = 10.8;
            $sd1 = 13.6;
        } else if ($usiaBulan == 25) {
            $median = 12.4;
            $sd = 11.0;
            $sd1 = 13.9;
        } else if ($usiaBulan == 26) {
            $median = 12.5;
            $sd = 11.2;
            $sd1 = 14.1;
        } else if ($usiaBulan == 27) {
            $median = 12.7;
            $sd = 11.3;
            $sd1 = 14.3;
        } else if ($usiaBulan == 28) {
            $median = 12.9;
            $sd = 11.5;
            $sd1 = 14.5;
        } else if ($usiaBulan == 29) {
            $median = 13.1;
            $sd = 11.7;
            $sd1 = 14.8;
        } else if ($usiaBulan == 30) {
            $median = 13.3;
            $sd = 11.8;
            $sd1 = 15.0;
        } else if ($usiaBulan == 31) {
            $median = 13.5;
            $sd = 12.0;
            $sd1 = 15.2;
        } else if ($usiaBulan == 32) {
            $median = 13.7;
            $sd = 12.1;
            $sd1 = 15.4;
        } else if ($usiaBulan == 33) {
            $median = 13.8;
            $sd = 12.3;
            $sd1 = 15.6;
        } else if ($usiaBulan == 34) {
            $median = 14.0;
            $sd = 12.4;
            $sd1 = 15.8;
        } else if ($usiaBulan == 35) {
            $median = 14.2;
            $sd = 12.6;
            $sd1 = 16.0;
        } else if ($usiaBulan == 36) {
            $median = 14.3;
            $sd = 12.7;
            $sd1 = 16.2;
        } else if ($usiaBulan == 37) {
            $median = 14.5;
            $sd = 12.9;
            $sd1 = 16.2;
        } else if ($usiaBulan == 38) {
            $median = 14.7;
            $sd = 13.0;
            $sd1 = 16.4;
        } else if ($usiaBulan == 39) {
            $median = 14.8;
            $sd = 13.1;
            $sd1 = 16.6;
        } else if ($usiaBulan == 40) {
            $median = 15.0;
            $sd = 13.3;
            $sd1 = 16.8;
        } else if ($usiaBulan == 41) {
            $median = 15.2;
            $sd = 13.4;
            $sd1 = 17.0;
        } else if ($usiaBulan == 42) {
            $median = 15.3;
            $sd = 13.6;
            $sd1 = 17.2;
        } else if ($usiaBulan == 43) {
            $median = 15.5;
            $sd = 13.7;
            $sd1 = 17.4;
        } else if ($usiaBulan == 44) {
            $median = 15.7;
            $sd = 13.8;
            $sd1 = 17.8;
        } else if ($usiaBulan == 45) {
            $median = 15.8;
            $sd = 14.0;
            $sd1 = 18.0;
        } else if ($usiaBulan == 46) {
            $median = 16.0;
            $sd = 14.1;
            $sd1 = 18.2;
        } else if ($usiaBulan == 47) {
            $median = 16.2;
            $sd = 14.3;
            $sd1 = 18.4;
        } else if ($usiaBulan == 48) {
            $median = 16.3;
            $sd = 14.4;
            $sd1 = 18.6;
        } else if ($usiaBulan == 49) {
            $median = 16.5;
            $sd = 14.5;
            $sd1 = 18.8;
        } else if ($usiaBulan == 50) {
            $median = 16.7;
            $sd = 14.7;
            $sd1 = 19.0;
        } else if ($usiaBulan == 51) {
            $median = 16.8;
            $sd = 14.8;
            $sd1 = 19.2;
        } else if ($usiaBulan == 52) {
            $median = 17.0;
            $sd = 15.0;
            $sd1 = 19.4;
        } else if ($usiaBulan == 53) {
            $median = 17.2;
            $sd = 15.1;
            $sd1 = 19.6;
        } else if ($usiaBulan == 54) {
            $median = 17.3;
            $sd = 15.2;
            $sd1 = 19.8;
        } else if ($usiaBulan == 55) {
            $median = 17.5;
            $sd = 15.4;
            $sd1 = 20.0;
        } else if ($usiaBulan == 56) {
            $median = 17.7;
            $sd = 15.5;
            $sd1 = 20.2;
        } else if ($usiaBulan == 57) {
            $median = 17.8;
            $sd = 15.6;
            $sd1 = 20.4;
        } else if ($usiaBulan == 58) {
            $median = 18.0;
            $sd = 15.8;
            $sd1 = 20.6;
        } else if ($usiaBulan == 59) {
            $median = 18.2;
            $sd = 15.9;
            $sd1 = 20.8;
        } else {
            $median = 18.3;
            $sd = 16.0;
            $sd1 = 21.0;
        }
    }
    if ($jenisKelamin == "Perempuan") {
        if ($usiaBulan == 0) {
            $median = 3.2;
            $sd = 2.8;
            $sd1 = 3.7;
        } else if ($usiaBulan == 1) {
            $median = 4.2;
            $sd = 3.6;
            $sd1 = 4.8;
        } else if ($usiaBulan == 2) {
            $median = 5.1;
            $sd = 4.5;
            $sd1 = 5.8;
        } else if ($usiaBulan == 3) {
            $median = 5.8;
            $sd = 5.2;
            $sd1 = 6.6;
        } else if ($usiaBulan == 4) {
            $median = 6.4;
            $sd = 5.7;
            $sd1 = 7.3;
        } else if ($usiaBulan == 5) {
            $median = 6.9;
            $sd = 6.1;
            $sd1 = 7.8;
        } else if ($usiaBulan == 6) {
            $median = 7.3;
            $sd = 6.5;
            $sd1 = 8.2;
        } else if ($usiaBulan == 7) {
            $median = 7.6;
            $sd = 6.8;
            $sd1 = 8.6;
        } else if ($usiaBulan == 8) {
            $median = 7.9;
            $sd = 7.0;
            $sd1 = 9.0;
        } else if ($usiaBulan == 9) {
            $median = 8.2;
            $sd = 7.3;
            $sd1 = 9.3;
        } else if ($usiaBulan == 10) {
            $median = 8.5;
            $sd = 7.5;
            $sd1 = 9.6;
        } else if ($usiaBulan == 11) {
            $median = 8.7;
            $sd = 7.7;
            $sd1 = 9.9;
        } else if ($usiaBulan == 12) {
            $median = 8.9;
            $sd = 7.9;
            $sd1 = 10.1;
        } else if ($usiaBulan == 13) {
            $median = 9.2;
            $sd = 8.1;
            $sd1 = 10.4;
        } else if ($usiaBulan == 14) {
            $median = 9.4;
            $sd = 8.3;
            $sd1 = 10.6;
        } else if ($usiaBulan == 15) {
            $median = 9.6;
            $sd = 8.5;
            $sd1 = 10.9;
        } else if ($usiaBulan == 16) {
            $median = 9.8;
            $sd = 8.7;
            $sd1 = 11.1;
        } else if ($usiaBulan == 17) {
            $median = 10.0;
            $sd = 8.9;
            $sd1 = 11.4;
        } else if ($usiaBulan == 18) {
            $median = 10.2;
            $sd = 9.1;
            $sd1 = 11.6;
        } else if ($usiaBulan == 19) {
            $median = 10.4;
            $sd = 9.2;
            $sd1 = 11.8;
        } else if ($usiaBulan == 20) {
            $median = 10.6;
            $sd = 9.4;
            $sd1 = 12.1;
        } else if ($usiaBulan == 21) {
            $median = 10.9;
            $sd = 9.6;
            $sd1 = 12.3;
        } else if ($usiaBulan == 22) {
            $median = 11.1;
            $sd = 9.8;
            $sd1 = 12.5;
        } else if ($usiaBulan == 23) {
            $median = 11.3;
            $sd = 10.0;
            $sd1 = 12.8;
        } else if ($usiaBulan == 24) {
            $median = 11.5;
            $sd = 10.2;
            $sd1 = 13.0;
        } else if ($usiaBulan == 25) {
            $median = 11.7;
            $sd = 10.3;
            $sd1 = 13.3;
        } else if ($usiaBulan == 26) {
            $median = 11.9;
            $sd = 10.5;
            $sd1 = 13.5;
        } else if ($usiaBulan == 27) {
            $median = 12.1;
            $sd = 10.7;
            $sd1 = 13.7;
        } else if ($usiaBulan == 28) {
            $median = 12.3;
            $sd = 10.9;
            $sd1 = 14.0;
        } else if ($usiaBulan == 29) {
            $median = 12.5;
            $sd = 11.1;
            $sd1 = 14.2;
        } else if ($usiaBulan == 30) {
            $median = 12.7;
            $sd = 11.2;
            $sd1 = 14.4;
        } else if ($usiaBulan == 31) {
            $median = 12.9;
            $sd = 11.4;
            $sd1 = 14.7;
        } else if ($usiaBulan == 32) {
            $median = 13.1;
            $sd = 11.6;
            $sd1 = 14.9;
        } else if ($usiaBulan == 33) {
            $median = 13.3;
            $sd = 11.7;
            $sd1 = 15.1;
        } else if ($usiaBulan == 34) {
            $median = 13.5;
            $sd = 11.9;
            $sd1 = 15.4;
        } else if ($usiaBulan == 35) {
            $median = 13.7;
            $sd = 12.0;
            $sd1 = 15.6;
        } else if ($usiaBulan == 36) {
            $median = 13.9;
            $sd = 12.2;
            $sd1 = 15.8;
        } else if ($usiaBulan == 37) {
            $median = 14.0;
            $sd = 12.4;
            $sd1 = 16.0;
        } else if ($usiaBulan == 38) {
            $median = 14.2;
            $sd = 12.5;
            $sd1 = 16.3;
        } else if ($usiaBulan == 39) {
            $median = 14.4;
            $sd = 12.7;
            $sd1 = 16.5;
        } else if ($usiaBulan == 40) {
            $median = 14.6;
            $sd = 12.8;
            $sd1 = 16.7;
        } else if ($usiaBulan == 41) {
            $median = 14.8;
            $sd = 13.0;
            $sd1 = 16.9;
        } else if ($usiaBulan == 42) {
            $median = 15.0;
            $sd = 13.1;
            $sd1 = 17.2;
        } else if ($usiaBulan == 43) {
            $median = 15.2;
            $sd = 13.3;
            $sd1 = 17.4;
        } else if ($usiaBulan == 44) {
            $median = 15.3;
            $sd = 13.4;
            $sd1 = 17.6;
        } else if ($usiaBulan == 45) {
            $median = 15.5;
            $sd = 13.6;
            $sd1 = 17.8;
        } else if ($usiaBulan == 46) {
            $median = 15.7;
            $sd = 13.7;
            $sd1 = 18.1;
        } else if ($usiaBulan == 47) {
            $median = 15.9;
            $sd = 13.9;
            $sd1 = 18.3;
        } else if ($usiaBulan == 48) {
            $median = 16.1;
            $sd = 14.0;
            $sd1 = 18.5;
        } else if ($usiaBulan == 49) {
            $median = 16.3;
            $sd = 14.2;
            $sd1 = 18.8;
        } else if ($usiaBulan == 50) {
            $median = 16.4;
            $sd = 14.3;
            $sd1 = 19.0;
        } else if ($usiaBulan == 51) {
            $median = 16.6;
            $sd = 14.5;
            $sd1 = 19.2;
        } else if ($usiaBulan == 52) {
            $median = 16.8;
            $sd = 14.6;
            $sd1 = 19.4;
        } else if ($usiaBulan == 53) {
            $median = 17.0;
            $sd = 14.8;
            $sd1 = 19.7;
        } else if ($usiaBulan == 54) {
            $median = 17.2;
            $sd = 14.9;
            $sd1 = 19.9;
        } else if ($usiaBulan == 55) {
            $median = 17.3;
            $sd = 15.1;
            $sd1 = 20.1;
        } else if ($usiaBulan == 56) {
            $median = 17.5;
            $sd = 15.2;
            $sd1 = 20.3;
        } else if ($usiaBulan == 57) {
            $median = 17.7;
            $sd = 15.3;
            $sd1 = 20.6;
        } else if ($usiaBulan == 58) {
            $median = 17.9;
            $sd = 15.5;
            $sd1 = 20.8;
        } else if ($usiaBulan == 59) {
            $median = 18.0;
            $sd = 15.6;
            $sd1 = 21.0;
        } else {
            $median = 18.2;
            $sd = 15.8;
            $sd1 = 21.2;
        }
    }

    if ($beratBadan > $median) {
        $ZScore = ($beratBadan - $median) / ($sd1 - $median);
    } else if ($beratBadan < $median) {
        $ZScore = ($beratBadan - $median) / ($median - $sd);
    } else if ($beratBadan == $median) {
        $ZScore = ($beratBadan - $median) / $median;
    }

    if ($ZScore < -3) {
        $kategoriGizi = "Sangat Kurang";
    } else if ($ZScore < -3 || $ZScore <= -2) {
        $kategoriGizi = "Kurang";
    } else if ($ZScore < -2 || $ZScore <= 2) {
        $kategoriGizi = "Berat Badan Normal";
    } else if ($ZScore > 2) {
        $kategoriGizi = "Berat Badan Lebih";
    }

    return $kategoriGizi;
}

function tbu($usiaBulan, $jenisKelamin, $tinggiBadan)
{
    if ($jenisKelamin  == "Laki-Laki") {
        if ($usiaBulan == 0) {
            $median = 49.9;
            $sd = 48.0;
            $sd1 = 51.8;
        } else if ($usiaBulan == 1) {
            $median = 54.7;
            $sd = 52.8;
            $sd1 = 56.7;
        } else if ($usiaBulan == 2) {
            $median = 58.4;
            $sd = 56.4;
            $sd1 = 60.4;
        } else if ($usiaBulan == 3) {
            $median = 61.4;
            $sd = 59.4;
            $sd1 = 63.5;
        } else if ($usiaBulan == 4) {
            $median = 63.9;
            $sd = 61.8;
            $sd1 = 66.0;
        } else if ($usiaBulan == 5) {
            $median = 65.9;
            $sd = 63.8;
            $sd1 = 68.0;
        } else if ($usiaBulan == 6) {
            $median = 67.6;
            $sd = 65.5;
            $sd1 = 69.8;
        } else if ($usiaBulan == 7) {
            $median = 69.2;
            $sd = 67.0;
            $sd1 = 71.3;
        } else if ($usiaBulan == 8) {
            $median = 70.6;
            $sd = 68.4;
            $sd1 = 72.8;
        } else if ($usiaBulan == 9) {
            $median = 72.0;
            $sd = 69.7;
            $sd1 = 74.2;
        } else if ($usiaBulan == 10) {
            $median = 73.3;
            $sd = 71.0;
            $sd1 = 75.6;
        } else if ($usiaBulan == 11) {
            $median = 74.5;
            $sd = 72.2;
            $sd1 = 76.9;
        } else if ($usiaBulan == 12) {
            $median = 75.7;
            $sd = 73.4;
            $sd1 = 78.1;
        } else if ($usiaBulan == 13) {
            $median = 76.9;
            $sd = 74.5;
            $sd1 = 79.3;
        } else if ($usiaBulan == 14) {
            $median = 78.0;
            $sd = 75.6;
            $sd1 = 80.5;
        } else if ($usiaBulan == 15) {
            $median = 79.1;
            $sd = 76.6;
            $sd1 = 81.7;
        } else if ($usiaBulan == 16) {
            $median = 80.2;
            $sd = 77.6;
            $sd1 = 82.8;
        } else if ($usiaBulan == 17) {
            $median = 81.2;
            $sd = 78.6;
            $sd1 = 83.9;
        } else if ($usiaBulan == 18) {
            $median = 82.3;
            $sd = 79.6;
            $sd1 = 85.0;
        } else if ($usiaBulan == 19) {
            $median = 83.2;
            $sd = 79.6;
            $sd1 = 85.0;
        } else if ($usiaBulan == 20) {
            $median = 84.2;
            $sd = 81.4;
            $sd1 = 87.0;
        } else if ($usiaBulan == 21) {
            $median = 85.1;
            $sd = 82.3;
            $sd1 = 88.0;
        } else if ($usiaBulan == 22) {
            $median = 86.0;
            $sd = 83.1;
            $sd1 = 89.0;
        } else if ($usiaBulan == 23) {
            $median = 86.9;
            $sd = 83.9;
            $sd1 = 89.9;
        } else if ($usiaBulan == 24) {
            $median = 87.8;
            $sd = 84.8;
            $sd1 = 90.9;
        } else if ($usiaBulan == 25) {
            $median = 88.0;
            $sd = 84.9;
            $sd1 = 91.1;
        } else if ($usiaBulan == 26) {
            $median = 88.8;
            $sd = 85.6;
            $sd1 = 92.0;
        } else if ($usiaBulan == 27) {
            $median = 89.6;
            $sd = 86.4;
            $sd1 = 92.9;
        } else if ($usiaBulan == 28) {
            $median = 90.4;
            $sd = 87.1;
            $sd1 = 93.7;
        } else if ($usiaBulan == 29) {
            $median = 91.2;
            $sd = 87.8;
            $sd1 = 94.5;
        } else if ($usiaBulan == 30) {
            $median = 91.9;
            $sd = 88.5;
            $sd1 = 95.3;
        } else if ($usiaBulan == 31) {
            $median = 92.7;
            $sd = 89.2;
            $sd1 = 96.1;
        } else if ($usiaBulan == 32) {
            $median = 93.4;
            $sd = 89.9;
            $sd1 = 96.9;
        } else if ($usiaBulan == 33) {
            $median = 94.1;
            $sd = 90.5;
            $sd1 = 97.6;
        } else if ($usiaBulan == 34) {
            $median = 94.8;
            $sd = 91.1;
            $sd1 = 98.4;
        } else if ($usiaBulan == 35) {
            $median = 95.4;
            $sd = 91.8;
            $sd1 = 99.1;
        } else if ($usiaBulan == 36) {
            $median = 96.1;
            $sd = 92.4;
            $sd1 = 99.8;
        } else if ($usiaBulan == 37) {
            $median = 96.7;
            $sd = 93.0;
            $sd1 = 100.5;
        } else if ($usiaBulan == 38) {
            $median = 97.4;
            $sd = 93.6;
            $sd1 = 101.2;
        } else if ($usiaBulan == 39) {
            $median = 98.0;
            $sd = 94.2;
            $sd1 = 101.8;
        } else if ($usiaBulan == 40) {
            $median = 98.6;
            $sd = 94.7;
            $sd1 = 102.5;
        } else if ($usiaBulan == 41) {
            $median = 99.2;
            $sd = 95.3;
            $sd1 = 103.2;
        } else if ($usiaBulan == 42) {
            $median = 99.9;
            $sd = 95.9;
            $sd1 = 103.8;
        } else if ($usiaBulan == 43) {
            $median = 100.4;
            $sd = 96.4;
            $sd1 = 104.5;
        } else if ($usiaBulan == 44) {
            $median = 101.0;
            $sd = 97.0;
            $sd1 = 105.1;
        } else if ($usiaBulan == 45) {
            $median = 101.6;
            $sd = 97.5;
            $sd1 = 105.7;
        } else if ($usiaBulan == 46) {
            $median = 102.2;
            $sd = 98.1;
            $sd1 = 106.3;
        } else if ($usiaBulan == 47) {
            $median = 102.8;
            $sd = 98.6;
            $sd1 = 106.9;
        } else if ($usiaBulan == 48) {
            $median = 103.3;
            $sd = 99.1;
            $sd1 = 107.5;
        } else if ($usiaBulan == 49) {
            $median = 103.9;
            $sd = 99.7;
            $sd1 = 108.1;
        } else if ($usiaBulan == 50) {
            $median = 104.4;
            $sd = 100.2;
            $sd1 = 108.7;
        } else if ($usiaBulan == 51) {
            $median = 105.0;
            $sd = 100.7;
            $sd1 = 109.3;
        } else if ($usiaBulan == 52) {
            $median = 105.6;
            $sd = 101.2;
            $sd1 = 109.9;
        } else if ($usiaBulan == 53) {
            $median = 106.1;
            $sd = 101.7;
            $sd1 = 110.5;
        } else if ($usiaBulan == 54) {
            $median = 106.7;
            $sd = 102.3;
            $sd1 = 111.1;
        } else if ($usiaBulan == 55) {
            $median = 107.2;
            $sd = 102.8;
            $sd1 = 111.7;
        } else if ($usiaBulan == 56) {
            $median = 107.8;
            $sd = 103.3;
            $sd1 = 112.3;
        } else if ($usiaBulan == 57) {
            $median = 108.3;
            $sd = 103.8;
            $sd1 = 112.8;
        } else if ($usiaBulan == 58) {
            $median = 108.9;
            $sd = 104.3;
            $sd1 = 113.4;
        } else if ($usiaBulan == 59) {
            $median = 109.4;
            $sd = 104.8;
            $sd1 = 114.0;
        } else {
            $median = 110.0;
            $sd = 105.3;
            $sd1 = 114.6;
        }
    }
    if ($jenisKelamin  == "Perempuan") {
        if ($usiaBulan == 0) {
            $median = 49.1;
            $sd = 47.3;
            $sd1 = 51.0;
        } else if ($usiaBulan == 1) {
            $median = 53.7;
            $sd = 51.7;
            $sd1 = 55.6;
        } else if ($usiaBulan == 2) {
            $median = 57.1;
            $sd = 55.0;
            $sd1 = 59.1;
        } else if ($usiaBulan == 3) {
            $median = 59.8;
            $sd = 57.7;
            $sd1 = 61.9;
        } else if ($usiaBulan == 4) {
            $median = 62.1;
            $sd = 59.9;
            $sd1 = 64.3;
        } else if ($usiaBulan == 5) {
            $median = 64.0;
            $sd = 61.8;
            $sd1 = 66.2;
        } else if ($usiaBulan == 6) {
            $median = 65.7;
            $sd = 63.5;
            $sd1 = 68.0;
        } else if ($usiaBulan == 7) {
            $median = 67.3;
            $sd = 65.0;
            $sd1 = 69.6;
        } else if ($usiaBulan == 8) {
            $median = 68.7;
            $sd = 66.4;
            $sd1 = 71.1;
        } else if ($usiaBulan == 9) {
            $median = 70.1;
            $sd = 67.7;
            $sd1 = 72.6;
        } else if ($usiaBulan == 10) {
            $median = 71.5;
            $sd = 69.0;
            $sd1 = 73.9;
        } else if ($usiaBulan == 11) {
            $median = 72.8;
            $sd = 70.3;
            $sd1 = 75.3;
        } else if ($usiaBulan == 12) {
            $median = 74.0;
            $sd = 71.4;
            $sd1 = 76.6;
        } else if ($usiaBulan == 13) {
            $median = 75.2;
            $sd = 72.6;
            $sd1 = 77.8;
        } else if ($usiaBulan == 14) {
            $median = 76.4;
            $sd = 73.7;
            $sd1 = 79.1;
        } else if ($usiaBulan == 15) {
            $median = 77.5;
            $sd = 74.8;
            $sd1 = 80.2;
        } else if ($usiaBulan == 16) {
            $median = 78.6;
            $sd = 75.8;
            $sd1 = 81.4;
        } else if ($usiaBulan == 17) {
            $median = 79.7;
            $sd = 76.8;
            $sd1 = 82.5;
        } else if ($usiaBulan == 18) {
            $median = 80.7;
            $sd = 77.8;
            $sd1 = 83.6;
        } else if ($usiaBulan == 19) {
            $median = 81.7;
            $sd = 78.8;
            $sd1 = 84.7;
        } else if ($usiaBulan == 20) {
            $median = 82.7;
            $sd = 79.7;
            $sd1 = 85.7;
        } else if ($usiaBulan == 21) {
            $median = 83.7;
            $sd = 80.6;
            $sd1 = 86.7;
        } else if ($usiaBulan == 22) {
            $median = 84.6;
            $sd = 81.5;
            $sd1 = 87.7;
        } else if ($usiaBulan == 23) {
            $median = 85.5;
            $sd = 82.3;
            $sd1 = 88.7;
        } else if ($usiaBulan == 24) {
            $median = 86.4;
            $sd = 83.2;
            $sd1 = 89.6;
        } else if ($usiaBulan == 25) {
            $median = 86.6;
            $sd = 83.3;
            $sd1 = 89.9;
        } else if ($usiaBulan == 26) {
            $median = 87.4;
            $sd = 84.1;
            $sd1 = 90.8;
        } else if ($usiaBulan == 27) {
            $median = 88.3;
            $sd = 84.9;
            $sd1 = 91.7;
        } else if ($usiaBulan == 28) {
            $median = 89.1;
            $sd = 85.7;
            $sd1 = 92.5;
        } else if ($usiaBulan == 29) {
            $median = 89.9;
            $sd = 86.4;
            $sd1 = 93.4;
        } else if ($usiaBulan == 30) {
            $median = 90.7;
            $sd = 87.1;
            $sd1 = 94.2;
        } else if ($usiaBulan == 31) {
            $median = 91.4;
            $sd = 87.9;
            $sd1 = 95.0;
        } else if ($usiaBulan == 32) {
            $median = 92.2;
            $sd = 88.6;
            $sd1 = 95.8;
        } else if ($usiaBulan == 33) {
            $median = 92.9;
            $sd = 89.3;
            $sd1 = 96.6;
        } else if ($usiaBulan == 34) {
            $median = 93.6;
            $sd = 89.9;
            $sd1 = 97.4;
        } else if ($usiaBulan == 35) {
            $median = 94.4;
            $sd = 90.6;
            $sd1 = 98.1;
        } else if ($usiaBulan == 36) {
            $median = 95.1;
            $sd = 91.2;
            $sd1 = 98.9;
        } else if ($usiaBulan == 37) {
            $median = 95.7;
            $sd = 91.9;
            $sd1 = 99.6;
        } else if ($usiaBulan == 38) {
            $median = 96.4;
            $sd = 92.5;
            $sd1 = 100.3;
        } else if ($usiaBulan == 39) {
            $median = 97.1;
            $sd = 93.1;
            $sd1 = 101.0;
        } else if ($usiaBulan == 40) {
            $median = 97.7;
            $sd = 93.8;
            $sd1 = 101.7;
        } else if ($usiaBulan == 41) {
            $median = 98.4;
            $sd = 94.4;
            $sd1 = 102.4;
        } else if ($usiaBulan == 42) {
            $median = 99.0;
            $sd = 95.0;
            $sd1 = 103.1;
        } else if ($usiaBulan == 43) {
            $median = 99.7;
            $sd = 95.6;
            $sd1 = 103.8;
        } else if ($usiaBulan == 44) {
            $median = 100.3;
            $sd = 96.2;
            $sd1 = 104.5;
        } else if ($usiaBulan == 45) {
            $median = 100.9;
            $sd = 96.7;
            $sd1 = 105.1;
        } else if ($usiaBulan == 46) {
            $median = 101.5;
            $sd = 97.3;
            $sd1 = 105.8;
        } else if ($usiaBulan == 47) {
            $median = 102.1;
            $sd = 97.9;
            $sd1 = 106.4;
        } else if ($usiaBulan == 48) {
            $median = 102.7;
            $sd = 98.4;
            $sd1 = 107.0;
        } else if ($usiaBulan == 49) {
            $median = 103.3;
            $sd = 99.0;
            $sd1 = 107.7;
        } else if ($usiaBulan == 50) {
            $median = 103.9;
            $sd = 99.5;
            $sd1 = 108.3;
        } else if ($usiaBulan == 51) {
            $median = 104.5;
            $sd = 100.1;
            $sd1 = 108.9;
        } else if ($usiaBulan == 52) {
            $median = 105.0;
            $sd = 100.6;
            $sd1 = 109.5;
        } else if ($usiaBulan == 53) {
            $median = 105.6;
            $sd = 101.1;
            $sd1 = 110.1;
        } else if ($usiaBulan == 54) {
            $median = 106.2;
            $sd = 101.6;
            $sd1 = 110.7;
        } else if ($usiaBulan == 55) {
            $median = 106.7;
            $sd = 102.2;
            $sd1 = 111.3;
        } else if ($usiaBulan == 56) {
            $median = 107.3;
            $sd = 102.7;
            $sd1 = 111.9;
        } else if ($usiaBulan == 57) {
            $median = 107.8;
            $sd = 103.2;
            $sd1 = 112.5;
        } else if ($usiaBulan == 58) {
            $median = 108.4;
            $sd = 103.7;
            $sd1 = 113.0;
        } else if ($usiaBulan == 59) {
            $median = 108.9;
            $sd = 104.2;
            $sd1 = 115.6;
        } else {
            $median = 109.4;
            $sd = 104.7;
            $sd1 = 114.2;
        }
    }

    if ($tinggiBadan > $median) {
        $ZScore = ($tinggiBadan - $median) / ($sd1 - $median);
    } else if ($tinggiBadan < $median) {
        $ZScore = ($tinggiBadan - $median) / ($median - $sd);
    } else if ($tinggiBadan == $median) {
        $ZScore = ($tinggiBadan - $median) / $median;
    }

    if ($ZScore < -3) {
        $kategoriTinggi = "Sangat Pendek";
    } else if ($ZScore < -3 || $ZScore <= -2) {
        $kategoriTinggi = "Pendek";
    } else if ($ZScore < -2 || $ZScore <= 2) {
        $kategoriTinggi = "Normal";
    } else if ($ZScore > 2) {
        $kategoriTinggi = "Tinggi";
    }

    return $kategoriTinggi;
}

function bbtb($usiaBulan, $jenisKelamin, $tinggiBadan, $beratBadan)
{
    if ($jenisKelamin == "Laki-Laki") {
        if ($usiaBulan >= 0 && $usiaBulan <= 24) {
            if ($tinggiBadan < 45.5) {
                $median = 2.4;
                $sd = 2.2;
                $sd1 = 2.7;
            } else if ($tinggiBadan >= 45.5 && $tinggiBadan < 46) {
                $median = 2.5;
                $sd = 2.3;
                $sd1 = 2.8;
            } else if ($tinggiBadan >= 46 && $tinggiBadan < 46.5) {
                $median = 2.6;
                $sd = 2.4;
                $sd1 = 2.9;
            } else if ($tinggiBadan >= 46.5 && $tinggiBadan < 47) {
                $median = 2.7;
                $sd = 2.5;
                $sd1 = 3;
            } else if ($tinggiBadan >= 47 && $tinggiBadan < 47.5) {
                $median = 2.8;
                $sd = 2.5;
                $sd1 = 3;
            } else if ($tinggiBadan >= 47.5 && $tinggiBadan < 48) {
                $median = 2.9;
                $sd = 2.6;
                $sd1 = 3.1;
            } else if ($tinggiBadan >= 48 && $tinggiBadan < 48.5) {
                $median = 2.9;
                $sd = 2.7;
                $sd1 = 3.2;
            } else if ($tinggiBadan >= 48.5 && $tinggiBadan < 49) {
                $median = 3;
                $sd = 2.8;
                $sd1 = 3.3;
            } else if ($tinggiBadan >= 49 && $tinggiBadan < 49.5) {
                $median = 3.1;
                $sd = 2.9;
                $sd1 = 3.4;
            } else if ($tinggiBadan >= 49.5 && $tinggiBadan < 50) {
                $median = 3.2;
                $sd = 3;
                $sd1 = 3.5;
            } else if ($tinggiBadan >= 50 && $tinggiBadan < 50.5) {
                $median = 3.3;
                $sd = 3;
                $sd1 = 3.6;
            } else if ($tinggiBadan >= 50.5 && $tinggiBadan < 51) {
                $median = 3.4;
                $sd = 3.1;
                $sd1 = 3.8;
            } else if ($tinggiBadan >= 50.5 && $tinggiBadan < 51) {
                $median = 3.4;
                $sd = 3.1;
                $sd1 = 3.8;
            } else if ($tinggiBadan >= 51 && $tinggiBadan < 51.5) {
                $median = 3.5;
                $sd = 3.2;
                $sd1 = 3.9;
            } else if ($tinggiBadan >= 51.5 && $tinggiBadan < 52) {
                $median = 3.6;
                $sd = 3.3;
                $sd1 = 4;
            } else if ($tinggiBadan >= 52 && $tinggiBadan < 52.5) {
                $median = 3.8;
                $sd = 3.5;
                $sd1 = 4.1;
            } else if ($tinggiBadan >= 52.5 && $tinggiBadan < 53) {
                $median = 3.9;
                $sd = 3.6;
                $sd1 = 4.2;
            } else if ($tinggiBadan >= 53 && $tinggiBadan < 53.5) {
                $median = 4.0;
                $sd = 3.7;
                $sd1 = 4.4;
            } else if ($tinggiBadan >= 53.5 && $tinggiBadan < 54) {
                $median = 4.1;
                $sd = 3.8;
                $sd1 = 4.5;
            } else if ($tinggiBadan >= 54 && $tinggiBadan < 54.5) {
                $median = 4.3;
                $sd = 3.9;
                $sd1 = 4.7;
            } else if ($tinggiBadan >= 54.5 && $tinggiBadan < 55) {
                $median = 4.4;
                $sd = 4;
                $sd1 = 4.8;
            } else if ($tinggiBadan >= 55 && $tinggiBadan < 55.5) {
                $median = 4.5;
                $sd = 4.2;
                $sd1 = 5;
            } else if ($tinggiBadan >= 55.5 && $tinggiBadan < 56) {
                $median = 4.7;
                $sd = 4.3;
                $sd1 = 5.1;
            } else if ($tinggiBadan >= 56 && $tinggiBadan < 56.5) {
                $median = 4.8;
                $sd = 4.4;
                $sd1 = 5.3;
            } else if ($tinggiBadan >= 56.5 && $tinggiBadan < 57) {
                $median = 5;
                $sd = 4.6;
                $sd1 = 5.4;
            } else if ($tinggiBadan >= 57 && $tinggiBadan < 57.5) {
                $median = 5.1;
                $sd = 4.7;
                $sd1 = 5.6;
            } else if ($tinggiBadan >= 57.5 && $tinggiBadan < 58) {
                $median = 5.3;
                $sd = 4.9;
                $sd1 = 5.7;
            } else if ($tinggiBadan >= 58 && $tinggiBadan < 58.5) {
                $median = 5.4;
                $sd = 5;
                $sd1 = 5.9;
            } else if ($tinggiBadan >= 58.5 && $tinggiBadan < 59) {
                $median = 5.6;
                $sd = 5.1;
                $sd1 = 6.1;
            } else if ($tinggiBadan >= 59 && $tinggiBadan < 59.5) {
                $median = 5.7;
                $sd = 5.3;
                $sd1 = 6.2;
            } else if ($tinggiBadan >= 59.5 && $tinggiBadan < 60) {
                $median = 5.9;
                $sd = 5.4;
                $sd1 = 6.4;
            } else if ($tinggiBadan >= 60 && $tinggiBadan < 60.5) {
                $median = 6;
                $sd = 5.5;
                $sd1 = 6.5;
            } else if ($tinggiBadan >= 60.5 && $tinggiBadan < 61) {
                $median = 6.1;
                $sd = 5.6;
                $sd1 = 6.7;
            } else if ($tinggiBadan >= 61 && $tinggiBadan < 61.5) {
                $median = 6.3;
                $sd = 5.8;
                $sd1 = 6.8;
            } else if ($tinggiBadan >= 61.5 && $tinggiBadan < 62) {
                $median = 6.4;
                $sd = 5.9;
                $sd1 = 7;
            } else if ($tinggiBadan >= 62 && $tinggiBadan < 62.5) {
                $median = 6.5;
                $sd = 6;
                $sd1 = 7.1;
            } else if ($tinggiBadan >= 62.5 && $tinggiBadan < 63) {
                $median = 6.7;
                $sd = 6.1;
                $sd1 = 7.2;
            } else if ($tinggiBadan >= 63 && $tinggiBadan < 63.5) {
                $median = 6.8;
                $sd = 6.2;
                $sd1 = 7.4;
            } else if ($tinggiBadan >= 63.5 && $tinggiBadan < 64) {
                $median = 6.9;
                $sd = 6.4;
                $sd1 = 7.5;
            } else if ($tinggiBadan >= 64 && $tinggiBadan < 64.5) {
                $median = 7;
                $sd = 6.5;
                $sd1 = 7.6;
            } else if ($tinggiBadan >= 64.5 && $tinggiBadan < 65) {
                $median = 7.1;
                $sd = 6.6;
                $sd1 = 7.8;
            } else if ($tinggiBadan >= 65 && $tinggiBadan < 65.5) {
                $median = 7.3;
                $sd = 6.7;
                $sd1 = 7.9;
            } else if ($tinggiBadan >= 65.5 && $tinggiBadan < 66) {
                $median = 7.4;
                $sd = 6.8;
                $sd1 = 8;
            } else if ($tinggiBadan >= 66 && $tinggiBadan < 66.5) {
                $median = 7.5;
                $sd = 6.9;
                $sd1 = 8.2;
            } else if ($tinggiBadan >= 66.5 && $tinggiBadan < 67) {
                $median = 7.6;
                $sd = 7;
                $sd1 = 8.3;
            } else if ($tinggiBadan >= 67 && $tinggiBadan < 67.5) {
                $median = 7.7;
                $sd = 7.1;
                $sd1 = 8.4;
            } else if ($tinggiBadan >= 67.5 && $tinggiBadan < 68) {
                $median = 7.9;
                $sd = 7.2;
                $sd1 = 8.5;
            } else if ($tinggiBadan >= 68 && $tinggiBadan < 68.5) {
                $median = 8;
                $sd = 7.3;
                $sd1 = 8.7;
            } else if ($tinggiBadan >= 68.5 && $tinggiBadan < 69) {
                $median = 8.1;
                $sd = 7.5;
                $sd1 = 8.8;
            } else if ($tinggiBadan >= 69 && $tinggiBadan < 69.5) {
                $median = 8.2;
                $sd = 7.6;
                $sd1 = 8.9;
            } else if ($tinggiBadan >= 69.5 && $tinggiBadan < 70) {
                $median = 8.3;
                $sd = 7.7;
                $sd1 = 9;
            } else if ($tinggiBadan >= 70 && $tinggiBadan < 70.5) {
                $median = 8.4;
                $sd = 7.8;
                $sd1 = 9.2;
            } else if ($tinggiBadan >= 70.5 && $tinggiBadan < 71) {
                $median = 8.5;
                $sd = 7.9;
                $sd1 = 9.3;
            } else if ($tinggiBadan >= 71 && $tinggiBadan < 71.5) {
                $median = 8.6;
                $sd = 8;
                $sd1 = 9.4;
            } else if ($tinggiBadan >= 71.5 && $tinggiBadan < 72) {
                $median = 8.8;
                $sd = 8.1;
                $sd1 = 9.5;
            } else if ($tinggiBadan >= 72 && $tinggiBadan < 72.5) {
                $median = 8.9;
                $sd = 8.2;
                $sd1 = 9.6;
            } else if ($tinggiBadan >= 72.5 && $tinggiBadan < 73) {
                $median = 9;
                $sd = 8.3;
                $sd1 = 9.8;
            } else if ($tinggiBadan >= 73 && $tinggiBadan < 73.5) {
                $median = 9.1;
                $sd = 8.4;
                $sd1 = 9.9;
            } else if ($tinggiBadan >= 73.5 && $tinggiBadan < 74) {
                $median = 9.2;
                $sd = 8.5;
                $sd1 = 10;
            } else if ($tinggiBadan >= 74 && $tinggiBadan < 74.5) {
                $median = 9.3;
                $sd = 8.6;
                $sd1 = 10.1;
            } else if ($tinggiBadan >= 74.5 && $tinggiBadan < 75) {
                $median = 9.4;
                $sd = 8.7;
                $sd1 = 10.2;
            } else if ($tinggiBadan >= 75 && $tinggiBadan < 75.5) {
                $median = 9.5;
                $sd = 8.8;
                $sd1 = 10.3;
            } else if ($tinggiBadan >= 75.5 && $tinggiBadan < 76) {
                $median = 9.6;
                $sd = 8.8;
                $sd1 = 10.4;
            } else if ($tinggiBadan >= 76 && $tinggiBadan < 76.5) {
                $median = 9.7;
                $sd = 8.9;
                $sd1 = 10.6;
            } else if ($tinggiBadan >= 76.5 && $tinggiBadan < 77) {
                $median = 9.8;
                $sd = 9;
                $sd1 = 10.7;
            } else if ($tinggiBadan >= 77 && $tinggiBadan < 77.5) {
                $median = 9.9;
                $sd = 9.1;
                $sd1 = 10.8;
            } else if ($tinggiBadan >= 77.5 && $tinggiBadan < 78) {
                $median = 10;
                $sd = 9.2;
                $sd1 = 10.9;
            } else if ($tinggiBadan >= 78 && $tinggiBadan < 78.5) {
                $median = 10.1;
                $sd = 9.3;
                $sd1 = 11;
            } else if ($tinggiBadan >= 78.5 && $tinggiBadan < 79) {
                $median = 10.2;
                $sd = 9.4;
                $sd1 = 11.1;
            } else if ($tinggiBadan >= 79 && $tinggiBadan < 79.5) {
                $median = 10.3;
                $sd = 9.5;
                $sd1 = 11.2;
            } else if ($tinggiBadan >= 79.5 && $tinggiBadan < 80) {
                $median = 10.4;
                $sd = 9.5;
                $sd1 = 11.3;
            } else if ($tinggiBadan >= 80 && $tinggiBadan < 80.5) {
                $median = 10.4;
                $sd = 9.6;
                $sd1 = 11.4;
            } else if ($tinggiBadan >= 80.5 && $tinggiBadan < 81) {
                $median = 10.5;
                $sd = 9.7;
                $sd1 = 11.5;
            } else if ($tinggiBadan >= 81 && $tinggiBadan < 81.5) {
                $median = 10.6;
                $sd = 9.8;
                $sd1 = 11.6;
            } else if ($tinggiBadan >= 81.5 && $tinggiBadan < 82) {
                $median = 10.7;
                $sd = 9.9;
                $sd1 = 11.7;
            } else if ($tinggiBadan >= 82 && $tinggiBadan < 82.5) {
                $median = 10.8;
                $sd = 10;
                $sd1 = 11.8;
            } else if ($tinggiBadan >= 82.5 && $tinggiBadan < 83) {
                $median = 10.9;
                $sd = 10.1;
                $sd1 = 11.9;
            } else if ($tinggiBadan >= 83 && $tinggiBadan < 83.5) {
                $median = 11;
                $sd = 10.2;
                $sd1 = 12;
            } else if ($tinggiBadan >= 83.5 && $tinggiBadan < 84) {
                $median = 11.2;
                $sd = 10.3;
                $sd1 = 12.1;
            } else if ($tinggiBadan >= 84 && $tinggiBadan < 84.5) {
                $median = 11.3;
                $sd = 10.4;
                $sd1 = 12.2;
            } else if ($tinggiBadan >= 84.5 && $tinggiBadan < 85) {
                $median = 11.4;
                $sd = 10.5;
                $sd1 = 12.4;
            } else if ($tinggiBadan >= 85 && $tinggiBadan < 85.5) {
                $median = 11.5;
                $sd = 10.6;
                $sd1 = 12.5;
            } else if ($tinggiBadan >= 85.5 && $tinggiBadan < 86) {
                $median = 11.6;
                $sd = 10.7;
                $sd1 = 12.6;
            } else if ($tinggiBadan >= 86 && $tinggiBadan < 86.5) {
                $median = 11.7;
                $sd = 10.8;
                $sd1 = 12.8;
            } else if ($tinggiBadan >= 86.5 && $tinggiBadan < 87) {
                $median = 11.9;
                $sd = 11;
                $sd1 = 12.9;
            } else if ($tinggiBadan >= 87 && $tinggiBadan < 87.5) {
                $median = 12;
                $sd = 11.1;
                $sd1 = 13;
            } else if ($tinggiBadan >= 87.5 && $tinggiBadan < 88) {
                $median = 12.1;
                $sd = 11.2;
                $sd1 = 13.2;
            } else if ($tinggiBadan >= 88 && $tinggiBadan < 88.5) {
                $median = 12.2;
                $sd = 11.3;
                $sd1 = 13.3;
            } else if ($tinggiBadan >= 88.5 && $tinggiBadan < 89) {
                $median = 12.4;
                $sd = 11.4;
                $sd1 = 13.4;
            } else if ($tinggiBadan >= 89 && $tinggiBadan < 89.5) {
                $median = 12.5;
                $sd = 11.5;
                $sd1 = 13.5;
            } else if ($tinggiBadan >= 89.5 && $tinggiBadan < 90) {
                $median = 12.6;
                $sd = 11.6;
                $sd1 = 13.7;
            } else if ($tinggiBadan >= 90 && $tinggiBadan < 90.5) {
                $median = 12.7;
                $sd = 11.8;
                $sd1 = 13.8;
            } else if ($tinggiBadan >= 90.5 && $tinggiBadan < 91) {
                $median = 12.8;
                $sd = 11.9;
                $sd1 = 13.9;
            } else if ($tinggiBadan >= 91 && $tinggiBadan < 91.5) {
                $median = 13;
                $sd = 12;
                $sd1 = 14.1;
            } else if ($tinggiBadan >= 91.5 && $tinggiBadan < 92) {
                $median = 13.1;
                $sd = 12.1;
                $sd1 = 14.2;
            } else if ($tinggiBadan >= 92 && $tinggiBadan < 92.5) {
                $median = 13.2;
                $sd = 12.2;
                $sd1 = 14.3;
            } else if ($tinggiBadan >= 92.5 && $tinggiBadan < 93) {
                $median = 13.3;
                $sd = 12.3;
                $sd1 = 14.4;
            } else if ($tinggiBadan >= 93 && $tinggiBadan < 93.5) {
                $median = 13.4;
                $sd = 12.4;
                $sd1 = 14.6;
            } else if ($tinggiBadan >= 93.5 && $tinggiBadan < 94) {
                $median = 13.5;
                $sd = 12.5;
                $sd1 = 14.7;
            } else if ($tinggiBadan >= 94 && $tinggiBadan < 94.5) {
                $median = 13.7;
                $sd = 12.6;
                $sd1 = 14.8;
            } else if ($tinggiBadan >= 94.5 && $tinggiBadan < 95) {
                $median = 13.8;
                $sd = 12.7;
                $sd1 = 14.9;
            } else if ($tinggiBadan >= 95 && $tinggiBadan < 95.5) {
                $median = 13.9;
                $sd = 12.8;
                $sd1 = 15.1;
            } else if ($tinggiBadan >= 95.5 && $tinggiBadan < 96) {
                $median = 14;
                $sd = 12.9;
                $sd1 = 15.2;
            } else if ($tinggiBadan >= 96 && $tinggiBadan < 96.5) {
                $median = 14.1;
                $sd = 13.1;
                $sd1 = 15.3;
            } else if ($tinggiBadan >= 96.5 && $tinggiBadan < 97) {
                $median = 14.3;
                $sd = 13.2;
                $sd1 = 15.5;
            } else if ($tinggiBadan >= 97 && $tinggiBadan < 97.5) {
                $median = 14.4;
                $sd = 13.3;
                $sd1 = 15.6;
            } else if ($tinggiBadan >= 97.5 && $tinggiBadan < 98) {
                $median = 14.5;
                $sd = 13.4;
                $sd1 = 15.7;
            } else if ($tinggiBadan >= 98 && $tinggiBadan < 98.5) {
                $median = 14.6;
                $sd = 13.5;
                $sd1 = 15.9;
            } else if ($tinggiBadan >= 98.5 && $tinggiBadan < 99) {
                $median = 14.8;
                $sd = 13.6;
                $sd1 = 16;
            } else if ($tinggiBadan >= 99 && $tinggiBadan < 99.5) {
                $median = 14.9;
                $sd = 13.7;
                $sd1 = 16.2;
            } else if ($tinggiBadan >= 99.5 && $tinggiBadan < 100) {
                $median = 15;
                $sd = 13.9;
                $sd1 = 16.3;
            } else if ($tinggiBadan >= 100 && $tinggiBadan < 100.5) {
                $median = 15.2;
                $sd = 14;
                $sd1 = 16.5;
            } else if ($tinggiBadan >= 100.5 && $tinggiBadan < 101) {
                $median = 15.3;
                $sd = 14.1;
                $sd1 = 16.6;
            } else if ($tinggiBadan >= 101 && $tinggiBadan < 101.5) {
                $median = 15.4;
                $sd = 14.2;
                $sd1 = 16.8;
            } else if ($tinggiBadan >= 101.5 && $tinggiBadan < 102) {
                $median = 15.6;
                $sd = 14.4;
                $sd1 = 16.9;
            } else if ($tinggiBadan >= 102 && $tinggiBadan < 102.5) {
                $median = 15.7;
                $sd = 14.5;
                $sd1 = 17.1;
            } else if ($tinggiBadan >= 102.5 && $tinggiBadan < 103) {
                $median = 15.9;
                $sd = 14.6;
                $sd1 = 17.3;
            } else if ($tinggiBadan >= 103 && $tinggiBadan < 103.5) {
                $median = 16;
                $sd = 14.8;
                $sd1 = 17.4;
            } else if ($tinggiBadan >= 103.5 && $tinggiBadan < 104) {
                $median = 16.2;
                $sd = 14.9;
                $sd1 = 17.6;
            } else if ($tinggiBadan >= 104 && $tinggiBadan < 104.5) {
                $median = 16.3;
                $sd = 15;
                $sd1 = 17.8;
            } else if ($tinggiBadan >= 104.5 && $tinggiBadan < 105) {
                $median = 16.5;
                $sd = 15.2;
                $sd1 = 17.9;
            } else if ($tinggiBadan >= 105 && $tinggiBadan < 105.5) {
                $median = 16.6;
                $sd = 15.3;
                $sd1 = 18.1;
            } else if ($tinggiBadan >= 105.5 && $tinggiBadan < 106) {
                $median = 16.8;
                $sd = 15.4;
                $sd1 = 18.3;
            } else if ($tinggiBadan >= 106 && $tinggiBadan < 106.5) {
                $median = 16.9;
                $sd = 15.6;
                $sd1 = 18.5;
            } else if ($tinggiBadan >= 106.5 && $tinggiBadan < 107) {
                $median = 17.1;
                $sd = 15.7;
                $sd1 = 18.6;
            } else if ($tinggiBadan >= 107 && $tinggiBadan < 107.5) {
                $median = 17.3;
                $sd = 15.9;
                $sd1 = 18.8;
            } else if ($tinggiBadan >= 107.5 && $tinggiBadan < 108) {
                $median = 17.4;
                $sd = 16;
                $sd1 = 19;
            } else if ($tinggiBadan >= 108 && $tinggiBadan < 108.5) {
                $median = 17.6;
                $sd = 16.2;
                $sd1 = 19.2;
            } else if ($tinggiBadan >= 108.5 && $tinggiBadan < 109) {
                $median = 1708;
                $sd = 16.3;
                $sd1 = 19.4;
            } else if ($tinggiBadan >= 109 && $tinggiBadan < 109.5) {
                $median = 17.9;
                $sd = 16.5;
                $sd1 = 19.6;
            } else if ($tinggiBadan >= 109.5 && $tinggiBadan < 110) {
                $median = 18.1;
                $sd = 16.6;
                $sd1 = 19.8;
            } else if ($tinggiBadan >= 110) {
                $median = 18.3;
                $sd = 16.8;
                $sd1 = 20;
            }
        } else {
            if ($tinggiBadan < 65.5) {
                $median = 7.4;
                $sd = 6.9;
                $sd1 = 8.1;
            } else if ($tinggiBadan >= 65.5 && $tinggiBadan < 66) {
                $median = 7.6;
                $sd = 7;
                $sd1 = 8.2;
            } else if ($tinggiBadan >= 66 && $tinggiBadan < 66.5) {
                $median = 7.7;
                $sd = 7.1;
                $sd1 = 8.3;
            } else if ($tinggiBadan >= 66.5 && $tinggiBadan < 67) {
                $median = 7.8;
                $sd = 7.2;
                $sd1 = 8.5;
            } else if ($tinggiBadan >= 67 && $tinggiBadan < 67.5) {
                $median = 7.9;
                $sd = 7.3;
                $sd1 = 8.6;
            } else if ($tinggiBadan >= 67.5 && $tinggiBadan < 68) {
                $median = 8;
                $sd = 7.4;
                $sd1 = 8.7;
            } else if ($tinggiBadan >= 68 && $tinggiBadan < 68.5) {
                $median = 8.1;
                $sd = 7.5;
                $sd1 = 8.8;
            } else if ($tinggiBadan >= 68.5 && $tinggiBadan < 69) {
                $median = 8.2;
                $sd = 7.6;
                $sd1 = 9;
            } else if ($tinggiBadan >= 69 && $tinggiBadan < 69.5) {
                $median = 8.4;
                $sd = 7.7;
                $sd1 = 9.1;
            } else if ($tinggiBadan >= 69.5 && $tinggiBadan < 70) {
                $median = 8.5;
                $sd = 7.8;
                $sd1 = 9.2;
            } else if ($tinggiBadan >= 70 && $tinggiBadan < 70.5) {
                $median = 8.6;
                $sd = 7.9;
                $sd1 = 9.3;
            } else if ($tinggiBadan >= 70.5 && $tinggiBadan < 71) {
                $median = 8.7;
                $sd = 8;
                $sd1 = 9.5;
            } else if ($tinggiBadan >= 71 && $tinggiBadan < 71.5) {
                $median = 8.8;
                $sd = 8.1;
                $sd1 = 9.6;
            } else if ($tinggiBadan >= 71.5 && $tinggiBadan < 72) {
                $median = 8.9;
                $sd = 8.2;
                $sd1 = 9.7;
            } else if ($tinggiBadan >= 72 && $tinggiBadan < 72.5) {
                $median = 9;
                $sd = 8.3;
                $sd1 = 9.8;
            } else if ($tinggiBadan >= 72.5 && $tinggiBadan < 73) {
                $median = 9.1;
                $sd = 8.4;
                $sd1 = 9.9;
            } else if ($tinggiBadan >= 73 && $tinggiBadan < 73.5) {
                $median = 9.2;
                $sd = 8.5;
                $sd1 = 10;
            } else if ($tinggiBadan >= 73.5 && $tinggiBadan < 74) {
                $median = 9.3;
                $sd = 8.6;
                $sd1 = 10.2;
            } else if ($tinggiBadan >= 74 && $tinggiBadan < 74.5) {
                $median = 9.4;
                $sd = 8.7;
                $sd1 = 10.3;
            } else if ($tinggiBadan >= 74.5 && $tinggiBadan < 75) {
                $median = 9.5;
                $sd = 8.8;
                $sd1 = 10.4;
            } else if ($tinggiBadan >= 75 && $tinggiBadan < 75.5) {
                $median = 9.6;
                $sd = 8.9;
                $sd1 = 10.5;
            } else if ($tinggiBadan >= 75.5 && $tinggiBadan < 76) {
                $median = 9.7;
                $sd = 9;
                $sd1 = 10.6;
            } else if ($tinggiBadan >= 76 && $tinggiBadan < 76.5) {
                $median = 9.8;
                $sd = 9.1;
                $sd1 = 10.7;
            } else if ($tinggiBadan >= 76.5 && $tinggiBadan < 77) {
                $median = 9.9;
                $sd = 9.2;
                $sd1 = 10.8;
            } else if ($tinggiBadan >= 77 && $tinggiBadan < 77.5) {
                $median = 10;
                $sd = 9.2;
                $sd1 = 10.9;
            } else if ($tinggiBadan >= 77.5 && $tinggiBadan < 78) {
                $median = 1.1;
                $sd = 9.3;
                $sd1 = 11;
            } else if ($tinggiBadan >= 78 && $tinggiBadan < 78.5) {
                $median = 1.2;
                $sd = 9.4;
                $sd1 = 11.1;
            } else if ($tinggiBadan >= 78.5 && $tinggiBadan < 79) {
                $median = 10.3;
                $sd = 9.5;
                $sd1 = 11.2;
            } else if ($tinggiBadan >= 79 && $tinggiBadan < 79.5) {
                $median = 1.4;
                $sd = 9.6;
                $sd1 = 11.3;
            } else if ($tinggiBadan >= 79.5 && $tinggiBadan < 80) {
                $median = 10.5;
                $sd = 9.7;
                $sd1 = 11.4;
            } else if ($tinggiBadan >= 80 && $tinggiBadan < 80.5) {
                $median = 10.6;
                $sd = 9.7;
                $sd1 = 11.5;
            } else if ($tinggiBadan >= 80.5 && $tinggiBadan < 81) {
                $median = 10.7;
                $sd = 9.8;
                $sd1 = 11.6;
            } else if ($tinggiBadan >= 81 && $tinggiBadan < 81.5) {
                $median = 10.8;
                $sd = 9.9;
                $sd1 = 11.7;
            } else if ($tinggiBadan >= 81.5 && $tinggiBadan < 82) {
                $median = 10.9;
                $sd = 10;
                $sd1 = 11.8;
            } else if ($tinggiBadan >= 82 && $tinggiBadan < 82.5) {
                $median = 11;
                $sd = 10.1;
                $sd1 = 11.9;
            } else if ($tinggiBadan >= 82.5 && $tinggiBadan < 83) {
                $median = 11.1;
                $sd = 10.2;
                $sd1 = 12.1;
            } else if ($tinggiBadan >= 83 && $tinggiBadan < 83.5) {
                $median = 11.2;
                $sd = 10.3;
                $sd1 = 12.2;
            } else if ($tinggiBadan >= 83.5 && $tinggiBadan < 84) {
                $median = 11.3;
                $sd = 10.4;
                $sd1 = 12.3;
            } else if ($tinggiBadan >= 84 && $tinggiBadan < 84.5) {
                $median = 11.4;
                $sd = 10.5;
                $sd1 = 12.4;
            } else if ($tinggiBadan >= 84.5 && $tinggiBadan < 85) {
                $median = 11.5;
                $sd = 10.7;
                $sd1 = 12.5;
            } else if ($tinggiBadan >= 85 && $tinggiBadan < 85.5) {
                $median = 11.7;
                $sd = 10.8;
                $sd1 = 12.7;
            } else if ($tinggiBadan >= 85.5 && $tinggiBadan < 86) {
                $median = 11.8;
                $sd = 10.9;
                $sd1 = 12.8;
            } else if ($tinggiBadan >= 86 && $tinggiBadan < 86.5) {
                $median = 11.9;
                $sd = 11;
                $sd1 = 12.9;
            } else if ($tinggiBadan >= 86.5 && $tinggiBadan < 87) {
                $median = 12;
                $sd = 11.1;
                $sd1 = 13.1;
            } else if ($tinggiBadan >= 87 && $tinggiBadan < 87.5) {
                $median = 12.2;
                $sd = 11.2;
                $sd1 = 13.2;
            } else if ($tinggiBadan >= 87.5 && $tinggiBadan < 88) {
                $median = 12.3;
                $sd = 11.3;
                $sd1 = 13.3;
            } else if ($tinggiBadan >= 88 && $tinggiBadan < 88.5) {
                $median = 12.4;
                $sd = 11.5;
                $sd1 = 13.5;
            } else if ($tinggiBadan >= 88.5 && $tinggiBadan < 89) {
                $median = 12.5;
                $sd = 11.6;
                $sd1 = 13.6;
            } else if ($tinggiBadan >= 89 && $tinggiBadan < 89.5) {
                $median = 12.6;
                $sd = 11.7;
                $sd1 = 13.7;
            } else if ($tinggiBadan >= 89.5 && $tinggiBadan < 90) {
                $median = 12.8;
                $sd = 11.8;
                $sd1 = 13.9;
            } else if ($tinggiBadan >= 90 && $tinggiBadan < 90.5) {
                $median = 12.9;
                $sd = 11.9;
                $sd1 = 14;
            } else if ($tinggiBadan >= 90.5 && $tinggiBadan < 91) {
                $median = 13;
                $sd = 12;
                $sd1 = 14.1;
            } else if ($tinggiBadan >= 91 && $tinggiBadan < 91.5) {
                $median = 13.1;
                $sd = 12.1;
                $sd1 = 14.2;
            } else if ($tinggiBadan >= 91.5 && $tinggiBadan < 92) {
                $median = 13.2;
                $sd = 12.2;
                $sd1 = 14.4;
            } else if ($tinggiBadan >= 92 && $tinggiBadan < 92.5) {
                $median = 13.4;
                $sd = 12.3;
                $sd1 = 14.5;
            } else if ($tinggiBadan >= 92.5 && $tinggiBadan < 93) {
                $median = 13.5;
                $sd = 12.4;
                $sd1 = 14.6;
            } else if ($tinggiBadan >= 93 && $tinggiBadan < 93.5) {
                $median = 13.6;
                $sd = 12.6;
                $sd1 = 14.7;
            } else if ($tinggiBadan >= 93.5 && $tinggiBadan < 94) {
                $median = 13.7;
                $sd = 12.7;
                $sd1 = 14.9;
            } else if ($tinggiBadan >= 94 && $tinggiBadan < 94.5) {
                $median = 13.8;
                $sd = 12.8;
                $sd1 = 15;
            } else if ($tinggiBadan >= 94.5 && $tinggiBadan < 95) {
                $median = 13.9;
                $sd = 12.9;
                $sd1 = 15.1;
            } else if ($tinggiBadan >= 95 && $tinggiBadan < 95.5) {
                $median = 14.1;
                $sd = 13;
                $sd1 = 15.3;
            } else if ($tinggiBadan >= 95.5 && $tinggiBadan < 96) {
                $median = 14.2;
                $sd = 13.1;
                $sd1 = 15.4;
            } else if ($tinggiBadan >= 96 && $tinggiBadan < 96.5) {
                $median = 14.3;
                $sd = 13.2;
                $sd1 = 15.5;
            } else if ($tinggiBadan >= 96.5 && $tinggiBadan < 97) {
                $median = 14.4;
                $sd = 13.3;
                $sd1 = 15.7;
            } else if ($tinggiBadan >= 97 && $tinggiBadan < 97.5) {
                $median = 14.6;
                $sd = 13.4;
                $sd1 = 15.8;
            } else if ($tinggiBadan >= 97.5 && $tinggiBadan < 98) {
                $median = 14.7;
                $sd = 13.6;
                $sd1 = 15.9;
            } else if ($tinggiBadan >= 98 && $tinggiBadan < 98.5) {
                $median = 14.8;
                $sd = 13.7;
                $sd1 = 16.1;
            } else if ($tinggiBadan >= 98.5 && $tinggiBadan < 99) {
                $median = 14.9;
                $sd = 13.8;
                $sd1 = 16.2;
            } else if ($tinggiBadan >= 99 && $tinggiBadan < 99.5) {
                $median = 15.1;
                $sd = 13.9;
                $sd1 = 16.4;
            } else if ($tinggiBadan >= 99.5 && $tinggiBadan < 100) {
                $median = 15.2;
                $sd = 14;
                $sd1 = 16.5;
            } else if ($tinggiBadan >= 100 && $tinggiBadan < 100.5) {
                $median = 15.4;
                $sd = 14.2;
                $sd1 = 16.7;
            } else if ($tinggiBadan >= 100.5 && $tinggiBadan < 101) {
                $median = 15.5;
                $sd = 14.3;
                $sd1 = 16.9;
            } else if ($tinggiBadan >= 101 && $tinggiBadan < 101.5) {
                $median = 15.6;
                $sd = 14.4;
                $sd1 = 17;
            } else if ($tinggiBadan >= 101.5 && $tinggiBadan < 102) {
                $median = 15.8;
                $sd = 14.5;
                $sd1 = 17.2;
            } else if ($tinggiBadan >= 102 && $tinggiBadan < 102.5) {
                $median = 15.9;
                $sd = 14.7;
                $sd1 = 17.3;
            } else if ($tinggiBadan >= 102.5 && $tinggiBadan < 103) {
                $median = 16.1;
                $sd = 14.8;
                $sd1 = 17.5;
            } else if ($tinggiBadan >= 103 && $tinggiBadan < 103.5) {
                $median = 16.2;
                $sd = 14.9;
                $sd1 = 17.7;
            } else if ($tinggiBadan >= 103.5 && $tinggiBadan < 104) {
                $median = 16.4;
                $sd = 15.1;
                $sd1 = 17.8;
            } else if ($tinggiBadan >= 104 && $tinggiBadan < 104.5) {
                $median = 16.5;
                $sd = 15.2;
                $sd1 = 18;
            } else if ($tinggiBadan >= 104.5 && $tinggiBadan < 105) {
                $median = 16.7;
                $sd = 15.4;
                $sd1 = 18.2;
            } else if ($tinggiBadan >= 105 && $tinggiBadan < 105.5) {
                $median = 16.8;
                $sd = 15.5;
                $sd1 = 18.4;
            } else if ($tinggiBadan >= 105.5 && $tinggiBadan < 106) {
                $median = 17;
                $sd = 15.6;
                $sd1 = 18.5;
            } else if ($tinggiBadan >= 106 && $tinggiBadan < 106.5) {
                $median = 17.2;
                $sd = 15.8;
                $sd1 = 18.7;
            } else if ($tinggiBadan >= 106.5 && $tinggiBadan < 107) {
                $median = 17.3;
                $sd = 15.9;
                $sd1 = 18.9;
            } else if ($tinggiBadan >= 107 && $tinggiBadan < 107.5) {
                $median = 17.5;
                $sd = 16.1;
                $sd1 = 19.1;
            } else if ($tinggiBadan >= 107.5 && $tinggiBadan < 108) {
                $median = 17.7;
                $sd = 16.2;
                $sd1 = 19.3;
            } else if ($tinggiBadan >= 108 && $tinggiBadan < 108.5) {
                $median = 17.8;
                $sd = 16.4;
                $sd1 = 19.5;
            } else if ($tinggiBadan >= 108.5 && $tinggiBadan < 109) {
                $median = 18;
                $sd = 16.5;
                $sd1 = 19.7;
            } else if ($tinggiBadan >= 109 && $tinggiBadan < 109.5) {
                $median = 18.2;
                $sd = 16.7;
                $sd1 = 19.8;
            } else if ($tinggiBadan >= 109.5 && $tinggiBadan < 110) {
                $median = 18.3;
                $sd = 16.8;
                $sd1 = 20;
            } else if ($tinggiBadan >= 110 && $tinggiBadan < 110.5) {
                $median = 18.5;
                $sd = 17;
                $sd1 = 20.2;
            } else if ($tinggiBadan >= 110.5 && $tinggiBadan < 111) {
                $median = 18.7;
                $sd = 17.1;
                $sd1 = 20.4;
            } else if ($tinggiBadan >= 111 && $tinggiBadan < 111.5) {
                $median = 18.9;
                $sd = 17.3;
                $sd1 = 20.7;
            } else if ($tinggiBadan >= 111.5 && $tinggiBadan < 112) {
                $median = 19.1;
                $sd = 17.5;
                $sd1 = 20.9;
            } else if ($tinggiBadan >= 112 && $tinggiBadan < 112.5) {
                $median = 19.2;
                $sd = 17.6;
                $sd1 = 21.1;
            } else if ($tinggiBadan >= 112.5 && $tinggiBadan < 113) {
                $median = 19.4;
                $sd = 17.8;
                $sd1 = 21.3;
            } else if ($tinggiBadan >= 113 && $tinggiBadan < 113.5) {
                $median = 19.6;
                $sd = 18;
                $sd1 = 21.5;
            } else if ($tinggiBadan >= 113.5 && $tinggiBadan < 114) {
                $median = 19.8;
                $sd = 18.1;
                $sd1 = 21.7;
            } else if ($tinggiBadan >= 114 && $tinggiBadan < 114.5) {
                $median = 20;
                $sd = 18.3;
                $sd1 = 21.9;
            } else if ($tinggiBadan >= 114.5 && $tinggiBadan < 115) {
                $median = 20.2;
                $sd = 18.5;
                $sd1 = 22.1;
            } else if ($tinggiBadan >= 115 && $tinggiBadan < 115.5) {
                $median = 20.4;
                $sd = 18.6;
                $sd1 = 22.4;
            } else if ($tinggiBadan >= 115.5 && $tinggiBadan < 116) {
                $median = 20.6;
                $sd = 18.8;
                $sd1 = 22.6;
            } else if ($tinggiBadan >= 116 && $tinggiBadan < 116.5) {
                $median = 20.8;
                $sd = 19;
                $sd1 = 22.8;
            } else if ($tinggiBadan >= 116.5 && $tinggiBadan < 117) {
                $median = 21;
                $sd = 19.2;
                $sd1 = 23;
            } else if ($tinggiBadan >= 117 && $tinggiBadan < 117.5) {
                $median = 21.2;
                $sd = 19.3;
                $sd1 = 23.3;
            } else if ($tinggiBadan >= 117.5 && $tinggiBadan < 118) {
                $median = 21.4;
                $sd = 19.5;
                $sd1 = 23.5;
            } else if ($tinggiBadan >= 118 && $tinggiBadan < 118.5) {
                $median = 21.6;
                $sd = 19.7;
                $sd1 = 23.7;
            } else if ($tinggiBadan >= 118.5 && $tinggiBadan < 119) {
                $median = 21.8;
                $sd = 19.9;
                $sd1 = 23.9;
            } else if ($tinggiBadan >= 119 && $tinggiBadan < 119.5) {
                $median = 22;
                $sd = 20;
                $sd1 = 24.1;
            } else if ($tinggiBadan >= 119.5 && $tinggiBadan < 120) {
                $median = 22.2;
                $sd = 20.2;
                $sd1 = 24.4;
            } else if ($tinggiBadan >= 120) {
                $median = 22.4;
                $sd = 20.4;
                $sd1 = 24.6;
            }
        }
    }

    if ($jenisKelamin == "Perempuan") {
        if ($usiaBulan >= 0 && $usiaBulan <= 24) {
            if ($tinggiBadan < 45.5) {
                $median = 2.5;
                $sd = 2.3;
                $sd1 = 2.7;
            } else if ($tinggiBadan >= 45.5 && $tinggiBadan < 46) {
                $median = 2.5;
                $sd = 2.3;
                $sd1 = 2.8;
            } else if ($tinggiBadan >= 46 && $tinggiBadan < 46.5) {
                $median = 2.6;
                $sd = 2.4;
                $sd1 = 2.9;
            } else if ($tinggiBadan >= 46.5 && $tinggiBadan < 47) {
                $median = 2.7;
                $sd = 2.5;
                $sd1 = 3;
            } else if ($tinggiBadan >= 47 && $tinggiBadan < 47.5) {
                $median = 2.8;
                $sd = 2.6;
                $sd1 = 3.1;
            } else if ($tinggiBadan >= 47.5 && $tinggiBadan < 48) {
                $median = 2.9;
                $sd = 2.6;
                $sd1 = 3.2;
            } else if ($tinggiBadan >= 48 && $tinggiBadan < 48.5) {
                $median = 3;
                $sd = 2.7;
                $sd1 = 3.3;
            } else if ($tinggiBadan >= 48.5 && $tinggiBadan < 49) {
                $median = 3.1;
                $sd = 2.8;
                $sd1 = 3.4;
            } else if ($tinggiBadan >= 49 && $tinggiBadan < 49.5) {
                $median = 3.2;
                $sd = 2.9;
                $sd1 = 3.5;
            } else if ($tinggiBadan >= 49.5 && $tinggiBadan < 50) {
                $median = 3.3;
                $sd = 3;
                $sd1 = 3.6;
            } else if ($tinggiBadan >= 50 && $tinggiBadan < 50.5) {
                $median = 3.4;
                $sd = 3.1;
                $sd1 = 3.7;
            } else if ($tinggiBadan >= 50.5 && $tinggiBadan < 51) {
                $median = 3.5;
                $sd = 3.2;
                $sd1 = 3.8;
            } else if ($tinggiBadan >= 51 && $tinggiBadan < 51.5) {
                $median = 3.6;
                $sd = 3.3;
                $sd1 = 3.9;
            } else if ($tinggiBadan >= 51.5 && $tinggiBadan < 52) {
                $median = 3.7;
                $sd = 3.4;
                $sd1 = 4;
            } else if ($tinggiBadan >= 52 && $tinggiBadan < 52.5) {
                $median = 3.8;
                $sd = 3.5;
                $sd1 = 4.2;
            } else if ($tinggiBadan >= 52.5 && $tinggiBadan < 53) {
                $median = 3.9;
                $sd = 3.6;
                $sd1 = 4.3;
            } else if ($tinggiBadan >= 53 && $tinggiBadan < 53.5) {
                $median = 4;
                $sd = 3.7;
                $sd1 = 4.4;
            } else if ($tinggiBadan >= 53.5 && $tinggiBadan < 54) {
                $median = 4.2;
                $sd = 3.8;
                $sd1 = 4.6;
            } else if ($tinggiBadan >= 54 && $tinggiBadan < 54.5) {
                $median = 4.3;
                $sd = 3.9;
                $sd1 = 4.7;
            } else if ($tinggiBadan >= 54.5 && $tinggiBadan < 55) {
                $median = 4.4;
                $sd = 4;
                $sd1 = 4.8;
            } else if ($tinggiBadan >= 55 && $tinggiBadan < 55.5) {
                $median = 4.5;
                $sd = 4.2;
                $sd1 = 5;
            } else if ($tinggiBadan >= 55.5 && $tinggiBadan < 56) {
                $median = 4.7;
                $sd = 4.3;
                $sd1 = 5.1;
            } else if ($tinggiBadan >= 56 && $tinggiBadan < 56.5) {
                $median = 4.8;
                $sd = 4.4;
                $sd1 = 5.3;
            } else if ($tinggiBadan >= 56.5 && $tinggiBadan < 57) {
                $median = 5;
                $sd = 4.5;
                $sd1 = 5.4;
            } else if ($tinggiBadan >= 57 && $tinggiBadan < 57.5) {
                $median = 5.1;
                $sd = 4.6;
                $sd1 = 5.6;
            } else if ($tinggiBadan >= 57.5 && $tinggiBadan < 58) {
                $median = 5.2;
                $sd = 4.8;
                $sd1 = 5.7;
            } else if ($tinggiBadan >= 58 && $tinggiBadan < 58.5) {
                $median = 5.4;
                $sd = 4.9;
                $sd1 = 5.9;
            } else if ($tinggiBadan >= 58.5 && $tinggiBadan < 59) {
                $median = 5.5;
                $sd = 5;
                $sd1 = 6;
            } else if ($tinggiBadan >= 59 && $tinggiBadan < 59.5) {
                $median = 5.6;
                $sd = 5.1;
                $sd1 = 6.2;
            } else if ($tinggiBadan >= 59.5 && $tinggiBadan < 60) {
                $median = 5.7;
                $sd = 5.3;
                $sd1 = 6.3;
            } else if ($tinggiBadan >= 60 && $tinggiBadan < 60.5) {
                $median = 5.9;
                $sd = 5.4;
                $sd1 = 6.4;
            } else if ($tinggiBadan >= 60.5 && $tinggiBadan < 61) {
                $median = 6;
                $sd = 5.5;
                $sd1 = 6.6;
            } else if ($tinggiBadan >= 61 && $tinggiBadan < 61.5) {
                $median = 6.1;
                $sd = 5.6;
                $sd1 = 6.7;
            } else if ($tinggiBadan >= 61.5 && $tinggiBadan < 62) {
                $median = 6.3;
                $sd = 5.7;
                $sd1 = 6.9;
            } else if ($tinggiBadan >= 62 && $tinggiBadan < 62.5) {
                $median = 6.4;
                $sd = 5.8;
                $sd1 = 7;
            } else if ($tinggiBadan >= 62.5 && $tinggiBadan < 63) {
                $median = 6.5;
                $sd = 5.9;
                $sd1 = 7.1;
            } else if ($tinggiBadan >= 63 && $tinggiBadan < 63.5) {
                $median = 6.6;
                $sd = 6;
                $sd1 = 7.3;
            } else if ($tinggiBadan >= 63.5 && $tinggiBadan < 64) {
                $median = 6.7;
                $sd = 6.2;
                $sd1 = 7.4;
            } else if ($tinggiBadan >= 64 && $tinggiBadan < 64.5) {
                $median = 6.9;
                $sd = 6.3;
                $sd1 = 7.5;
            } else if ($tinggiBadan >= 64.5 && $tinggiBadan < 65) {
                $median = 7;
                $sd = 6.4;
                $sd1 = 7.6;
            } else if ($tinggiBadan >= 65 && $tinggiBadan < 65.5) {
                $median = 7.1;
                $sd = 6.5;
                $sd1 = 7.8;
            } else if ($tinggiBadan >= 65.5 && $tinggiBadan < 66) {
                $median = 7.2;
                $sd = 6.6;
                $sd1 = 7.9;
            } else if ($tinggiBadan >= 66 && $tinggiBadan < 66.5) {
                $median = 7.3;
                $sd = 6.7;
                $sd1 = 8;
            } else if ($tinggiBadan >= 66.5 && $tinggiBadan < 67) {
                $median = 7.4;
                $sd = 6.8;
                $sd1 = 8.1;
            } else if ($tinggiBadan >= 67 && $tinggiBadan < 67.5) {
                $median = 7.5;
                $sd = 6.9;
                $sd1 = 8.3;
            } else if ($tinggiBadan >= 67.5 && $tinggiBadan < 68) {
                $median = 7.6;
                $sd = 7;
                $sd1 = 8.4;
            } else if ($tinggiBadan >= 68 && $tinggiBadan < 68.5) {
                $median = 7.7;
                $sd = 7.1;
                $sd1 = 8.5;
            } else if ($tinggiBadan >= 68.5 && $tinggiBadan < 69) {
                $median = 7.9;
                $sd = 7.2;
                $sd1 = 8.6;
            } else if ($tinggiBadan >= 69 && $tinggiBadan < 69.5) {
                $median = 8;
                $sd = 7.3;
                $sd1 = 8.7;
            } else if ($tinggiBadan >= 69.5 && $tinggiBadan < 70) {
                $median = 8.1;
                $sd = 7.4;
                $sd1 = 8.8;
            } else if ($tinggiBadan >= 70 && $tinggiBadan < 70.5) {
                $median = 8.2;
                $sd = 7.5;
                $sd1 = 9;
            } else if ($tinggiBadan >= 70.5 && $tinggiBadan < 71) {
                $median = 8.3;
                $sd = 7.6;
                $sd1 = 9.1;
            } else if ($tinggiBadan >= 71 && $tinggiBadan < 71.5) {
                $median = 8.4;
                $sd = 7.7;
                $sd1 = 9.2;
            } else if ($tinggiBadan >= 71.5 && $tinggiBadan < 72) {
                $median = 8.5;
                $sd = 7.7;
                $sd1 = 9.3;
            } else if ($tinggiBadan >= 72 && $tinggiBadan < 72.5) {
                $median = 8.6;
                $sd = 7.8;
                $sd1 = 9.4;
            } else if ($tinggiBadan >= 72.5 && $tinggiBadan < 73) {
                $median = 8.7;
                $sd = 7.9;
                $sd1 = 9.5;
            } else if ($tinggiBadan >= 73 && $tinggiBadan < 73.5) {
                $median = 8.8;
                $sd = 8;
                $sd1 = 9.6;
            } else if ($tinggiBadan >= 73.5 && $tinggiBadan < 74) {
                $median = 8.9;
                $sd = 8.1;
                $sd1 = 9.7;
            } else if ($tinggiBadan >= 74 && $tinggiBadan < 74.5) {
                $median = 9;
                $sd = 8.2;
                $sd1 = 9.8;
            } else if ($tinggiBadan >= 74.5 && $tinggiBadan < 75) {
                $median = 9.1;
                $sd = 8.3;
                $sd1 = 9.9;
            } else if ($tinggiBadan >= 75 && $tinggiBadan < 75.5) {
                $median = 9.1;
                $sd = 8.4;
                $sd1 = 10;
            } else if ($tinggiBadan >= 75.5 && $tinggiBadan < 76) {
                $median = 9.2;
                $sd = 8.5;
                $sd1 = 10.1;
            } else if ($tinggiBadan >= 76 && $tinggiBadan < 76.5) {
                $median = 9.3;
                $sd = 8.5;
                $sd1 = 10.2;
            } else if ($tinggiBadan >= 76.5 && $tinggiBadan < 77) {
                $median = 9.4;
                $sd = 8.6;
                $sd1 = 10.3;
            } else if ($tinggiBadan >= 77 && $tinggiBadan < 77.5) {
                $median = 9.5;
                $sd = 8.7;
                $sd1 = 10.4;
            } else if ($tinggiBadan >= 77.5 && $tinggiBadan < 78) {
                $median = 9.6;
                $sd = 8.8;
                $sd1 = 10.5;
            } else if ($tinggiBadan >= 78 && $tinggiBadan < 78.5) {
                $median = 9.7;
                $sd = 8.9;
                $sd1 = 10.6;
            } else if ($tinggiBadan >= 78.5 && $tinggiBadan < 79) {
                $median = 9.8;
                $sd = 9;
                $sd1 = 10.7;
            } else if ($tinggiBadan >= 79 && $tinggiBadan < 79.5) {
                $median = 9.9;
                $sd = 9.1;
                $sd1 = 10.8;
            } else if ($tinggiBadan >= 79.5 && $tinggiBadan < 80) {
                $median = 10;
                $sd = 9.1;
                $sd1 = 10.9;
            } else if ($tinggiBadan >= 80 && $tinggiBadan < 80.5) {
                $median = 10.1;
                $sd = 9.2;
                $sd1 = 11;
            } else if ($tinggiBadan >= 80.5 && $tinggiBadan < 81) {
                $median = 10.2;
                $sd = 9.3;
                $sd1 = 11.2;
            } else if ($tinggiBadan >= 81 && $tinggiBadan < 81.5) {
                $median = 10.3;
                $sd = 9.4;
                $sd1 = 11.3;
            } else if ($tinggiBadan >= 81.5 && $tinggiBadan < 82) {
                $median = 10.4;
                $sd = 9.5;
                $sd1 = 11.4;
            } else if ($tinggiBadan >= 82 && $tinggiBadan < 82.5) {
                $median = 10.5;
                $sd = 9.6;
                $sd1 = 11.5;
            } else if ($tinggiBadan >= 82.5 && $tinggiBadan < 83) {
                $median = 10.6;
                $sd = 9.7;
                $sd1 = 11.6;
            } else if ($tinggiBadan >= 83 && $tinggiBadan < 83.5) {
                $median = 10.7;
                $sd = 9.8;
                $sd1 = 11.8;
            } else if ($tinggiBadan >= 83.5 && $tinggiBadan < 84) {
                $median = 10.9;
                $sd = 9.9;
                $sd1 = 11.9;
            } else if ($tinggiBadan >= 84 && $tinggiBadan < 84.5) {
                $median = 11;
                $sd = 10.1;
                $sd1 = 12;
            } else if ($tinggiBadan >= 84.5 && $tinggiBadan < 85) {
                $median = 11.1;
                $sd = 10.2;
                $sd1 = 12.1;
            } else if ($tinggiBadan >= 85 && $tinggiBadan < 85.5) {
                $median = 11.2;
                $sd = 10.3;
                $sd1 = 12.3;
            } else if ($tinggiBadan >= 85.5 && $tinggiBadan < 86) {
                $median = 11.3;
                $sd = 10.4;
                $sd1 = 12.4;
            } else if ($tinggiBadan >= 86 && $tinggiBadan < 86.5) {
                $median = 11.5;
                $sd = 10.5;
                $sd1 = 12.6;
            } else if ($tinggiBadan >= 86.5 && $tinggiBadan < 87) {
                $median = 11.6;
                $sd = 10.6;
                $sd1 = 12.7;
            } else if ($tinggiBadan >= 87 && $tinggiBadan < 87.5) {
                $median = 11.7;
                $sd = 10.7;
                $sd1 = 12.8;
            } else if ($tinggiBadan >= 87.5 && $tinggiBadan < 88) {
                $median = 11.8;
                $sd = 10.9;
                $sd1 = 13;
            } else if ($tinggiBadan >= 88 && $tinggiBadan < 88.5) {
                $median = 12;
                $sd = 11;
                $sd1 = 13.1;
            } else if ($tinggiBadan >= 88.5 && $tinggiBadan < 89) {
                $median = 12.1;
                $sd = 11.1;
                $sd1 = 13.2;
            } else if ($tinggiBadan >= 89 && $tinggiBadan < 89.5) {
                $median = 12.2;
                $sd = 11.2;
                $sd1 = 13.4;
            } else if ($tinggiBadan >= 89.5 && $tinggiBadan < 90) {
                $median = 12.3;
                $sd = 11.3;
                $sd1 = 13.5;
            } else if ($tinggiBadan >= 90 && $tinggiBadan < 90.5) {
                $median = 12.5;
                $sd = 11.4;
                $sd1 = 13.7;
            } else if ($tinggiBadan >= 90.5 && $tinggiBadan < 91) {
                $median = 12.6;
                $sd = 11.5;
                $sd1 = 13.8;
            } else if ($tinggiBadan >= 91 && $tinggiBadan < 91.5) {
                $median = 12.7;
                $sd = 11.7;
                $sd1 = 13.9;
            } else if ($tinggiBadan >= 91.5 && $tinggiBadan < 92) {
                $median = 12.8;
                $sd = 11.8;
                $sd1 = 14.1;
            } else if ($tinggiBadan >= 92 && $tinggiBadan < 92.5) {
                $median = 13;
                $sd = 11.9;
                $sd1 = 14.2;
            } else if ($tinggiBadan >= 92.5 && $tinggiBadan < 93) {
                $median = 13.1;
                $sd = 12;
                $sd1 = 14.3;
            } else if ($tinggiBadan >= 93 && $tinggiBadan < 93.5) {
                $median = 13.2;
                $sd = 12.1;
                $sd1 = 14.5;
            } else if ($tinggiBadan >= 93.5 && $tinggiBadan < 94) {
                $median = 13.3;
                $sd = 12.2;
                $sd1 = 14.6;
            } else if ($tinggiBadan >= 94 && $tinggiBadan < 94.5) {
                $median = 13.5;
                $sd = 12.3;
                $sd1 = 14.7;
            } else if ($tinggiBadan >= 94.5 && $tinggiBadan < 95) {
                $median = 13.6;
                $sd = 12.4;
                $sd1 = 14.9;
            } else if ($tinggiBadan >= 95 && $tinggiBadan < 95.5) {
                $median = 13.7;
                $sd = 12.6;
                $sd1 = 15;
            } else if ($tinggiBadan >= 95.5 && $tinggiBadan < 96) {
                $median = 13.8;
                $sd = 12.7;
                $sd1 = 15.2;
            } else if ($tinggiBadan >= 96 && $tinggiBadan < 96.5) {
                $median = 14;
                $sd = 12.8;
                $sd1 = 15.3;
            } else if ($tinggiBadan >= 96.5 && $tinggiBadan < 97) {
                $median = 14.1;
                $sd = 12.9;
                $sd1 = 15.4;
            } else if ($tinggiBadan >= 97 && $tinggiBadan < 97.5) {
                $median = 14.2;
                $sd = 13;
                $sd1 = 15.6;
            } else if ($tinggiBadan >= 97.5 && $tinggiBadan < 98) {
                $median = 14.4;
                $sd = 13.1;
                $sd1 = 15.7;
            } else if ($tinggiBadan >= 98 && $tinggiBadan < 98.5) {
                $median = 14.5;
                $sd = 13.3;
                $sd1 = 15.9;
            } else if ($tinggiBadan >= 98.5 && $tinggiBadan < 99) {
                $median = 14.6;
                $sd = 13.4;
                $sd1 = 16;
            } else if ($tinggiBadan >= 99 && $tinggiBadan < 99.5) {
                $median = 14.8;
                $sd = 13.5;
                $sd1 = 16.2;
            } else if ($tinggiBadan >= 99.5 && $tinggiBadan < 100) {
                $median = 14.9;
                $sd = 13.6;
                $sd1 = 16.3;
            } else if ($tinggiBadan >= 100 && $tinggiBadan < 100.5) {
                $median = 15;
                $sd = 13.7;
                $sd1 = 16.5;
            } else if ($tinggiBadan >= 100.5 && $tinggiBadan < 101) {
                $median = 15.2;
                $sd = 13.9;
                $sd1 = 16.6;
            } else if ($tinggiBadan >= 101 && $tinggiBadan < 101.5) {
                $median = 15.3;
                $sd = 14;
                $sd1 = 16.8;
            } else if ($tinggiBadan >= 101.5 && $tinggiBadan < 102) {
                $median = 15.5;
                $sd = 14.1;
                $sd1 = 17;
            } else if ($tinggiBadan >= 102 && $tinggiBadan < 102.5) {
                $median = 15.6;
                $sd = 14.3;
                $sd1 = 17.1;
            } else if ($tinggiBadan >= 102.5 && $tinggiBadan < 103) {
                $median = 15.8;
                $sd = 14.4;
                $sd1 = 17.3;
            } else if ($tinggiBadan >= 103 && $tinggiBadan < 103.5) {
                $median = 15.9;
                $sd = 14.5;
                $sd1 = 17.5;
            } else if ($tinggiBadan >= 103.5 && $tinggiBadan < 104) {
                $median = 16.1;
                $sd = 14.7;
                $sd1 = 17.6;
            } else if ($tinggiBadan >= 104 && $tinggiBadan < 104.5) {
                $median = 16.2;
                $sd = 14.8;
                $sd1 = 17.8;
            } else if ($tinggiBadan >= 104.5 && $tinggiBadan < 105) {
                $median = 16.4;
                $sd = 15;
                $sd1 = 18;
            } else if ($tinggiBadan >= 105 && $tinggiBadan < 105.5) {
                $median = 16.5;
                $sd = 15.1;
                $sd1 = 18.2;
            } else if ($tinggiBadan >= 105.5 && $tinggiBadan < 106) {
                $median = 16.7;
                $sd = 15.3;
                $sd1 = 18.4;
            } else if ($tinggiBadan >= 106 && $tinggiBadan < 106.5) {
                $median = 16.9;
                $sd = 15.4;
                $sd1 = 18.5;
            } else if ($tinggiBadan >= 106.5 && $tinggiBadan < 107) {
                $median = 17.1;
                $sd = 15.6;
                $sd1 = 18.7;
            } else if ($tinggiBadan >= 107 && $tinggiBadan < 107.5) {
                $median = 17.2;
                $sd = 15.7;
                $sd1 = 18.9;
            } else if ($tinggiBadan >= 107.5 && $tinggiBadan < 108) {
                $median = 17.4;
                $sd = 15.9;
                $sd1 = 19.1;
            } else if ($tinggiBadan >= 108 && $tinggiBadan < 108.5) {
                $median = 17.6;
                $sd = 16;
                $sd1 = 19.3;
            } else if ($tinggiBadan >= 108.5 && $tinggiBadan < 109) {
                $median = 17.8;
                $sd = 16.2;
                $sd1 = 19.5;
            } else if ($tinggiBadan >= 109 && $tinggiBadan < 109.5) {
                $median = 18;
                $sd = 16.4;
                $sd1 = 19.7;
            } else if ($tinggiBadan >= 109.5 && $tinggiBadan < 110) {
                $median = 18.1;
                $sd = 16.5;
                $sd1 = 20;
            } else if ($tinggiBadan >= 110) {
                $median = 18.3;
                $sd = 16.7;
                $sd1 = 20.2;
            }
        } else {
            if ($tinggiBadan < 65.5) {
                $median = 7.2;
                $sd = 6.6;
                $sd1 = 7.9;
            } else if ($tinggiBadan >= 65.5 && $tinggiBadan < 66) {
                $median = 7.4;
                $sd = 6.7;
                $sd1 = 8.1;
            } else if ($tinggiBadan >= 66 && $tinggiBadan < 66.5) {
                $median = 7.5;
                $sd = 6.8;
                $sd1 = 8.2;
            } else if ($tinggiBadan >= 66.5 && $tinggiBadan < 67) {
                $median = 7.6;
                $sd = 6.9;
                $sd1 = 8.3;
            } else if ($tinggiBadan >= 67 && $tinggiBadan < 67.5) {
                $median = 7.7;
                $sd = 7;
                $sd1 = 8.4;
            } else if ($tinggiBadan >= 67.5 && $tinggiBadan < 68) {
                $median = 7.8;
                $sd = 7.1;
                $sd1 = 8.5;
            } else if ($tinggiBadan >= 68 && $tinggiBadan < 68.5) {
                $median = 7.9;
                $sd = 7.2;
                $sd1 = 8.7;
            } else if ($tinggiBadan >= 68.5 && $tinggiBadan < 69) {
                $median = 8;
                $sd = 7.3;
                $sd1 = 8.8;
            } else if ($tinggiBadan >= 69 && $tinggiBadan < 69.5) {
                $median = 8.1;
                $sd = 7.4;
                $sd1 = 8.9;
            } else if ($tinggiBadan >= 69.5 && $tinggiBadan < 70) {
                $median = 8.2;
                $sd = 7.5;
                $sd1 = 9;
            } else if ($tinggiBadan >= 70 && $tinggiBadan < 70.5) {
                $median = 8.3;
                $sd = 7.6;
                $sd1 = 9.1;
            } else if ($tinggiBadan >= 70.5 && $tinggiBadan < 71) {
                $median = 8.4;
                $sd = 7.7;
                $sd1 = 9.2;
            } else if ($tinggiBadan >= 71 && $tinggiBadan < 71.5) {
                $median = 8.5;
                $sd = 7.8;
                $sd1 = 9.3;
            } else if ($tinggiBadan >= 71.5 && $tinggiBadan < 72) {
                $median = 8.6;
                $sd = 7.9;
                $sd1 = 9.4;
            } else if ($tinggiBadan >= 72 && $tinggiBadan < 72.5) {
                $median = 8.7;
                $sd = 8;
                $sd1 = 9.5;
            } else if ($tinggiBadan >= 72.5 && $tinggiBadan < 73) {
                $median = 8.8;
                $sd = 8.1;
                $sd1 = 9.7;
            } else if ($tinggiBadan >= 73 && $tinggiBadan < 73.5) {
                $median = 8.9;
                $sd = 8.1;
                $sd1 = 9.8;
            } else if ($tinggiBadan >= 73.5 && $tinggiBadan < 74) {
                $median = 9;
                $sd = 8.2;
                $sd1 = 9.9;
            } else if ($tinggiBadan >= 74 && $tinggiBadan < 74.5) {
                $median = 9.1;
                $sd = 8.3;
                $sd1 = 10;
            } else if ($tinggiBadan >= 74.5 && $tinggiBadan < 75) {
                $median = 9.2;
                $sd = 8.4;
                $sd1 = 10.1;
            } else if ($tinggiBadan >= 75 && $tinggiBadan < 75.5) {
                $median = 9.3;
                $sd = 8.5;
                $sd1 = 10.2;
            } else if ($tinggiBadan >= 75.5 && $tinggiBadan < 76) {
                $median = 9.4;
                $sd = 8.6;
                $sd1 = 10.3;
            } else if ($tinggiBadan >= 76 && $tinggiBadan < 76.5) {
                $median = 9.5;
                $sd = 8.7;
                $sd1 = 10.4;
            } else if ($tinggiBadan >= 76.5 && $tinggiBadan < 77) {
                $median = 9.6;
                $sd = 8.7;
                $sd1 = 10.5;
            } else if ($tinggiBadan >= 77 && $tinggiBadan < 77.5) {
                $median = 9.6;
                $sd = 8.8;
                $sd1 = 10.6;
            } else if ($tinggiBadan >= 77.5 && $tinggiBadan < 78) {
                $median = 9.7;
                $sd = 8.9;
                $sd1 = 10.7;
            } else if ($tinggiBadan >= 78 && $tinggiBadan < 78.5) {
                $median = 9.8;
                $sd = 9;
                $sd1 = 10.8;
            } else if ($tinggiBadan >= 78.5 && $tinggiBadan < 79) {
                $median = 9.9;
                $sd = 9.1;
                $sd1 = 10.9;
            } else if ($tinggiBadan >= 79 && $tinggiBadan < 79.5) {
                $median = 10;
                $sd = 9.2;
                $sd1 = 11;
            } else if ($tinggiBadan >= 79.5 && $tinggiBadan < 80) {
                $median = 10.1;
                $sd = 9.3;
                $sd1 = 11.1;
            } else if ($tinggiBadan >= 80 && $tinggiBadan < 80.5) {
                $median = 10.2;
                $sd = 9.4;
                $sd1 = 11.2;
            } else if ($tinggiBadan >= 80.5 && $tinggiBadan < 81) {
                $median = 10.3;
                $sd = 9.5;
                $sd1 = 11.3;
            } else if ($tinggiBadan >= 81 && $tinggiBadan < 81.5) {
                $median = 10.4;
                $sd = 9.6;
                $sd1 = 11.4;
            } else if ($tinggiBadan >= 81.5 && $tinggiBadan < 82) {
                $median = 10.6;
                $sd = 9.7;
                $sd1 = 11.6;
            } else if ($tinggiBadan >= 82 && $tinggiBadan < 82.5) {
                $median = 10.7;
                $sd = 9.8;
                $sd1 = 11.7;
            } else if ($tinggiBadan >= 82.5 && $tinggiBadan < 83) {
                $median = 10.8;
                $sd = 9.9;
                $sd1 = 11.8;
            } else if ($tinggiBadan >= 83 && $tinggiBadan < 83.5) {
                $median = 10.9;
                $sd = 10;
                $sd1 = 11.9;
            } else if ($tinggiBadan >= 83.5 && $tinggiBadan < 84) {
                $median = 11;
                $sd = 10.1;
                $sd1 = 12.1;
            } else if ($tinggiBadan >= 84 && $tinggiBadan < 84.5) {
                $median = 11.1;
                $sd = 10.2;
                $sd1 = 12.2;
            } else if ($tinggiBadan >= 84.5 && $tinggiBadan < 85) {
                $median = 11.3;
                $sd = 10.3;
                $sd1 = 12.3;
            } else if ($tinggiBadan >= 85 && $tinggiBadan < 85.5) {
                $median = 11.4;
                $sd = 10.4;
                $sd1 = 12.5;
            } else if ($tinggiBadan >= 85.5 && $tinggiBadan < 86) {
                $median = 11.5;
                $sd = 10.6;
                $sd1 = 12.6;
            } else if ($tinggiBadan >= 86 && $tinggiBadan < 86.5) {
                $median = 11.6;
                $sd = 10.7;
                $sd1 = 12.7;
            } else if ($tinggiBadan >= 86.5 && $tinggiBadan < 87) {
                $median = 11.8;
                $sd = 10.8;
                $sd1 = 12.9;
            } else if ($tinggiBadan >= 87 && $tinggiBadan < 87.5) {
                $median = 11.9;
                $sd = 10.9;
                $sd1 = 13;
            } else if ($tinggiBadan >= 87.5 && $tinggiBadan < 88) {
                $median = 12;
                $sd = 11;
                $sd1 = 13.2;
            } else if ($tinggiBadan >= 88 && $tinggiBadan < 88.5) {
                $median = 12.1;
                $sd = 11.1;
                $sd1 = 13.3;
            } else if ($tinggiBadan >= 88.5 && $tinggiBadan < 89) {
                $median = 12.3;
                $sd = 11.2;
                $sd1 = 13.4;
            } else if ($tinggiBadan >= 89 && $tinggiBadan < 89.5) {
                $median = 12.4;
                $sd = 11.4;
                $sd1 = 13.6;
            } else if ($tinggiBadan >= 89.5 && $tinggiBadan < 90) {
                $median = 12.5;
                $sd = 11.5;
                $sd1 = 13.7;
            } else if ($tinggiBadan >= 90 && $tinggiBadan < 90.5) {
                $median = 12.6;
                $sd = 11.6;
                $sd1 = 13.8;
            } else if ($tinggiBadan >= 90.5 && $tinggiBadan < 91) {
                $median = 12.8;
                $sd = 11.7;
                $sd1 = 14;
            } else if ($tinggiBadan >= 91 && $tinggiBadan < 91.5) {
                $median = 12.9;
                $sd = 11.8;
                $sd1 = 14.1;
            } else if ($tinggiBadan >= 91.5 && $tinggiBadan < 92) {
                $median = 13;
                $sd = 11.9;
                $sd1 = 14.3;
            } else if ($tinggiBadan >= 92 && $tinggiBadan < 92.5) {
                $median = 13.1;
                $sd = 12;
                $sd1 = 14.4;
            } else if ($tinggiBadan >= 92.5 && $tinggiBadan < 93) {
                $median = 13.3;
                $sd = 12.1;
                $sd1 = 14.5;
            } else if ($tinggiBadan >= 93 && $tinggiBadan < 93.5) {
                $median = 13.4;
                $sd = 12.3;
                $sd1 = 14.7;
            } else if ($tinggiBadan >= 93.5 && $tinggiBadan < 94) {
                $median = 13.5;
                $sd = 12.4;
                $sd1 = 14.8;
            } else if ($tinggiBadan >= 94 && $tinggiBadan < 94.5) {
                $median = 13.6;
                $sd = 12.5;
                $sd1 = 14.9;
            } else if ($tinggiBadan >= 94.5 && $tinggiBadan < 95) {
                $median = 13.8;
                $sd = 12.6;
                $sd1 = 15.1;
            } else if ($tinggiBadan >= 95 && $tinggiBadan < 95.5) {
                $median = 13.9;
                $sd = 12.7;
                $sd1 = 15.2;
            } else if ($tinggiBadan >= 95.5 && $tinggiBadan < 96) {
                $median = 14;
                $sd = 12.8;
                $sd1 = 15.4;
            } else if ($tinggiBadan >= 96 && $tinggiBadan < 96.5) {
                $median = 14.1;
                $sd = 12.9;
                $sd1 = 15.5;
            } else if ($tinggiBadan >= 96.5 && $tinggiBadan < 97) {
                $median = 14.3;
                $sd = 13.1;
                $sd1 = 15.6;
            } else if ($tinggiBadan >= 97 && $tinggiBadan < 97.5) {
                $median = 14.4;
                $sd = 13.2;
                $sd1 = 15.8;
            } else if ($tinggiBadan >= 97.5 && $tinggiBadan < 98) {
                $median = 14.5;
                $sd = 13.3;
                $sd1 = 15.9;
            } else if ($tinggiBadan >= 98 && $tinggiBadan < 98.5) {
                $median = 14.7;
                $sd = 13.4;
                $sd1 = 16.1;
            } else if ($tinggiBadan >= 98.5 && $tinggiBadan < 99) {
                $median = 14.8;
                $sd = 13.5;
                $sd1 = 16.2;
            } else if ($tinggiBadan >= 99 && $tinggiBadan < 99.5) {
                $median = 14.9;
                $sd = 13.7;
                $sd1 = 16.4;
            } else if ($tinggiBadan >= 99.5 && $tinggiBadan < 100) {
                $median = 15.1;
                $sd = 13.8;
                $sd1 = 16.5;
            } else if ($tinggiBadan >= 100 && $tinggiBadan < 100.5) {
                $median = 15.2;
                $sd = 13.9;
                $sd1 = 16.7;
            } else if ($tinggiBadan >= 100.5 && $tinggiBadan < 101) {
                $median = 15.4;
                $sd = 14.1;
                $sd1 = 16.9;
            } else if ($tinggiBadan >= 101 && $tinggiBadan < 101.5) {
                $median = 15.5;
                $sd = 14.2;
                $sd1 = 17;
            } else if ($tinggiBadan >= 101.5 && $tinggiBadan < 102) {
                $median = 15.7;
                $sd = 14.3;
                $sd1 = 17.2;
            } else if ($tinggiBadan >= 102 && $tinggiBadan < 102.5) {
                $median = 15.8;
                $sd = 14.5;
                $sd1 = 17.4;
            } else if ($tinggiBadan >= 102.5 && $tinggiBadan < 103) {
                $median = 16;
                $sd = 14.6;
                $sd1 = 17.5;
            } else if ($tinggiBadan >= 103 && $tinggiBadan < 103.5) {
                $median = 16.1;
                $sd = 14.7;
                $sd1 = 17.7;
            } else if ($tinggiBadan >= 103.5 && $tinggiBadan < 104) {
                $median = 16.3;
                $sd = 14.9;
                $sd1 = 17.9;
            } else if ($tinggiBadan >= 104 && $tinggiBadan < 104.5) {
                $median = 16.4;
                $sd = 15;
                $sd1 = 18.1;
            } else if ($tinggiBadan >= 104.5 && $tinggiBadan < 105) {
                $median = 16.6;
                $sd = 15.2;
                $sd1 = 18.2;
            } else if ($tinggiBadan >= 105 && $tinggiBadan < 105.5) {
                $median = 16.8;
                $sd = 15.3;
                $sd1 = 18.4;
            } else if ($tinggiBadan >= 105.5 && $tinggiBadan < 106) {
                $median = 16.9;
                $sd = 15.5;
                $sd1 = 18.6;
            } else if ($tinggiBadan >= 106 && $tinggiBadan < 106.5) {
                $median = 17.1;
                $sd = 15.6;
                $sd1 = 18.8;
            } else if ($tinggiBadan >= 106.5 && $tinggiBadan < 107) {
                $median = 17.3;
                $sd = 15.8;
                $sd1 = 19;
            } else if ($tinggiBadan >= 107 && $tinggiBadan < 107.5) {
                $median = 17.5;
                $sd = 15.9;
                $sd1 = 19.2;
            } else if ($tinggiBadan >= 107.5 && $tinggiBadan < 108) {
                $median = 17.7;
                $sd = 16.1;
                $sd1 = 19.4;
            } else if ($tinggiBadan >= 108 && $tinggiBadan < 108.5) {
                $median = 17.8;
                $sd = 16.3;
                $sd1 = 19.6;
            } else if ($tinggiBadan >= 108.5 && $tinggiBadan < 109) {
                $median = 18;
                $sd = 16.4;
                $sd1 = 19.8;
            } else if ($tinggiBadan >= 109 && $tinggiBadan < 109.5) {
                $median = 18.2;
                $sd = 16.6;
                $sd1 = 20;
            } else if ($tinggiBadan >= 109.5 && $tinggiBadan < 110) {
                $median = 18.4;
                $sd = 16.8;
                $sd1 = 20.3;
            } else if ($tinggiBadan >= 110 && $tinggiBadan < 110.5) {
                $median = 18.6;
                $sd = 17;
                $sd1 = 20.5;
            } else if ($tinggiBadan >= 110.5 && $tinggiBadan < 111) {
                $median = 18.8;
                $sd = 17.1;
                $sd1 = 20.7;
            } else if ($tinggiBadan >= 111 && $tinggiBadan < 111.5) {
                $median = 19;
                $sd = 17.3;
                $sd1 = 20.9;
            } else if ($tinggiBadan >= 111.5 && $tinggiBadan < 112) {
                $median = 19.2;
                $sd = 17.5;
                $sd1 = 21.2;
            } else if ($tinggiBadan >= 112 && $tinggiBadan < 112.5) {
                $median = 19.4;
                $sd = 17.7;
                $sd1 = 21.4;
            } else if ($tinggiBadan >= 112.5 && $tinggiBadan < 113) {
                $median = 19.6;
                $sd = 17.9;
                $sd1 = 21.6;
            } else if ($tinggiBadan >= 113 && $tinggiBadan < 113.5) {
                $median = 19.8;
                $sd = 18;
                $sd1 = 21.8;
            } else if ($tinggiBadan >= 113.5 && $tinggiBadan < 114) {
                $median = 20;
                $sd = 18.2;
                $sd1 = 22.1;
            } else if ($tinggiBadan >= 114 && $tinggiBadan < 114.5) {
                $median = 20.2;
                $sd = 18.4;
                $sd1 = 22.3;
            } else if ($tinggiBadan >= 114.5 && $tinggiBadan < 115) {
                $median = 20.5;
                $sd = 18.6;
                $sd1 = 22.6;
            } else if ($tinggiBadan >= 115 && $tinggiBadan < 115.5) {
                $median = 20.7;
                $sd = 18.8;
                $sd1 = 22.8;
            } else if ($tinggiBadan >= 115.5 && $tinggiBadan < 116) {
                $median = 20.9;
                $sd = 19;
                $sd1 = 23;
            } else if ($tinggiBadan >= 116 && $tinggiBadan < 116.5) {
                $median = 21.1;
                $sd = 19.2;
                $sd1 = 23.3;
            } else if ($tinggiBadan >= 116.5 && $tinggiBadan < 117) {
                $median = 21.3;
                $sd = 19.4;
                $sd1 = 23.5;
            } else if ($tinggiBadan >= 117 && $tinggiBadan < 117.5) {
                $median = 21.5;
                $sd = 19.6;
                $sd1 = 23.8;
            } else if ($tinggiBadan >= 117.5 && $tinggiBadan < 118) {
                $median = 21.7;
                $sd = 19.8;
                $sd1 = 24;
            } else if ($tinggiBadan >= 118 && $tinggiBadan < 188.5) {
                $median = 22;
                $sd = 19.9;
                $sd1 = 24.2;
            } else if ($tinggiBadan >= 118.5 && $tinggiBadan < 119) {
                $median = 22.2;
                $sd = 20.1;
                $sd1 = 24.5;
            } else if ($tinggiBadan >= 119 && $tinggiBadan < 119.5) {
                $median = 22.4;
                $sd = 20.3;
                $sd1 = 24.7;
            } else if ($tinggiBadan >= 119.5 && $tinggiBadan < 120) {
                $median = 22.6;
                $sd = 20.5;
                $sd1 = 25;
            } else if ($tinggiBadan >= 120) {
                $median = 22.8;
                $sd = 20.7;
                $sd1 = 25.2;
            }
        }
    }

    if ($beratBadan < $median) {
        $ZScore = ($beratBadan - $median) / ($median - $sd);
    } else {
        $ZScore = ($beratBadan - $median) / ($sd1 - $median);
    }

    if ($ZScore < -3) {
        $kategoriGizi = 'Gizi Buruk';
    } else if ($ZScore >= -3 && $ZScore < -2) {
        $kategoriGizi = 'Gizi Kurang';
    } else if ($ZScore >= -2 && $ZScore < 1) {
        $kategoriGizi = 'Gizi Baik';
    } else if ($ZScore >= 1 && $ZScore < 2) {
        $kategoriGizi = 'Beresiko Gizi Lebih';
    } else if ($ZScore >= 2 && $ZScore < 3) {
        $kategoriGizi = 'Gizi Lebih';
    } else {
        $kategoriGizi = 'Obesitas';
    }

    return $kategoriGizi;
}

function usiaBulan($tanggalLahir, $tanggalHitung)
{
    $usiaBulan = round(((strtotime($tanggalHitung) - strtotime($tanggalLahir)) / 86400) / 30);
    return $usiaBulan;
}

function usiaSebut($tanggalLahir, $tanggalHitung)
{
    $usia = Carbon::createFromDate($tanggalLahir)->diff($tanggalHitung)->format('%y Tahun - %m Bulan - %d Hari');
    return $usia;
}
