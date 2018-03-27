<?php

  require("../fpdf/fpdf.php");

	class PDF extends FPDF {

		var $widths;
		var $aligns;
		var $isFinished;

		// En-tête
		function Header() {

			//$this->Image('../images/logo-tertia.jpg',10,6,50);
			// Police Arial gras 16
			$this->SetFont('Arial','B',16);
			// Décalage à droite
			$this->Cell(60);
			// Titre
			$titre = utf8_decode("Questionnaire de positionnement");
			$this->Cell(100,10,$titre,1,1,'C');
		}

		// Pied de page
		function Footer() {

			// Logos
			// $this->Image('../images/fse_haut_de_france.png',10,280,25);
			// $this->Image('../images/iso_9001.jpg',37,280,25);
			// $this->Image('../images/iso14001.jpg',64,280,25);
			$this->SetY(-15);
			$this->SetFont('Arial', 'I', 8);
			$this->SetTextColor(0, 0, 0);
      $this->Cell(180, 6, 'Page n', 0, 0, 'R');
		}

		function SetWidths($w) {

			$this->widths = $w;
		}

		function SetAligns($a) {

			$this->aligns = $a;
		}

		function CheckPageBreak($h) {

			if ($this->GetY() + $h > $this->PageBreakTrigger)
				$this->AddPage($this->CurOrientation);
		}

		function NbLines($w, $txt) {

			$cw = &$this->CurrentFont['cw'];

			if($w == 0)
				$w = $this->w - $this->rMargin - $this->x;

			$wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;

			$s = str_replace("\r", '', $txt);

			$nb = strlen($s);

			if($nb > 0 && $s[$nb-1] == "\n")
				$nb--;

			$sep = -1; $i = 0; $j = 0; $l = 0; $nl = 1;

			while ($i < $nb) {

				$c = $s[$i];

				if ($c == "\n") {

					$i++; $sep = -1; $j = $i; $l = 0; $nl++; continue;
				}

				if ($c == ' ')
					$sep = $i;

				$l += $cw[$c];

				if ($l > $wmax) {

					if ($sep == -1) {

						if ($i == $j)
							$i++;
					}
					else
						$i = $sep+1;

					$sep = -1; $j = $i; $l = 0; $nl++;
				}
				else
					$i++;
			}

			return $nl;
		}

		function Row($data, $fill) {

			$nb = 0;

			for ($i=0; $i < count($data); $i++)
				$nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));

			$h = 5 * $nb;
			$this->CheckPageBreak($h);

			for ($i=0; $i < count($data); $i++) {

				$w = $this->widths[$i];
				$a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
				$x = $this->GetX();
				$y = $this->GetY();

				if ($fill == true) {

					$this->SetFillColor(230, 230, 230);
					$this->Rect($x, $y, $w, $h, 'F');

				}

				$this->MultiCell($w, 5, utf8_decode($data[$i]), 0, $a);
				$this->SetXY($x + $w, $y);
			}

			$this->Ln($h);
		}
	}


	// Enregistre le PDF des résultats de l'évaluation des competences
	function setPDFResultats($idMembre, $idMatiere, $idFormation, $questions, $reponses) {

		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();

		$pdf->SetFont('Arial','U',14);
		$pdf->Cell(0, 6, utf8_decode("Résultats de l'évaluation selon l'intitulé de question"), 0, 1, 'C');
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);
    $pdf->SetWidths(array(46, 46, 46, 46));
    $pdf->SetAligns(array('L', 'L', 'L', 'L'));
    $pdf->Row(array(get_nom_prenom_membre($idMembre), getNomMatiere($idMatiere), getNomFormation($idFormation), getScoreEvaluation($idMembre, $idMatiere, $idFormation)), false);


		for ($i=0; $i < count($questions); $i++) {

			$pdf->SetFont('Arial', 'B', 12);
			$pdf->SetWidths(array(185));
			$pdf->SetAligns(array('L'));
			$pdf->Row(array(($i+1).". ".$questions[$i]['intitule']), false);
			$pdf->SetFont('Arial', '', 12);
			$pdf->SetAligns(array('L'));
			$pdf->SetWidths(array(185));
			$pdf->Row(array("Vous avez répondu :"), false);
      $pdf->Ln();

      for($j = 0; $j < 5; $j++){

        if($reponses[$i][$j] == 1){

          $pdf->Row(array($questions[$i]['reponse'.($j+1).'']), false);
        }
      }

      if(aReussiQuestion($questions[$i]['id'], $idMembre)){

        $pdf->Row(array("Il s'agit de la ou des bonnes réponses"), false);

      } else {

        $pdf->Ln();
        $pdf->Row(array("Les réponses attendues étaient :"), false);

        for($k = 0; $k < 5; $k++){

          if($questions[$i]['bonne_reponse'.($k+1).''] == 1){

            $pdf->Row(array($questions[$i]['reponse'.($k+1).'']), false);
          }
        }
      }

      $pdf->Ln();
		}

		$pdf->isFinished = true;

		$pdf->Output("F", "../resultats/resultats-".$idMembre."-".$idMatiere."-".$idFormation.".pdf", true);
	}

 ?>
