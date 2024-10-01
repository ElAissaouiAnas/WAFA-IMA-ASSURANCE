<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{

	// protected $connection = 'nuitee';
	protected $table = 'assurances';

	protected $fillable = [
		'date_effet',
		'ville',
		'pays',
		'annee_vehicule',
		'marque_vehicule',
		'modele_vehicule',
		'num_vehicule',
		'totalAmount',
		'montant',
		'contrat_id',
		'type',
		'prenom',
		'nom',
		'type_identifiant',
		'identifiant',
		'sexe',
		'email',
		'tel',
		'lieunaissance',
		'datenaissance',
		'conjoints',
		'enfants',
		'vehicule',
		'addresse',
		'prenom_c1',
		'nom_c1',
		'datenaissance_c1',
		'prenom_c2',
		'nom_c2',
		'datenaissance_c2',
		'prenom_c3',
		'nom_c3',
		'datenaissance_c3',
		'prenom_c4',
		'nom_c4',
		'datenaissance_c4',
		'prenom_e1',
		'nom_e1',
		'datenaissance_e1',
		'prenom_e2',
		'nom_e2',
		'datenaissance_e2',
		'prenom_e3',
		'nom_e3',
		'datenaissance_e3',
		'prenom_e4',
		'nom_e4',
		'datenaissance_e4',
		'prenom_e5',
		'nom_e5',
		'datenaissance_e5',
		'prenom_e6',
		'nom_e6',
		'datenaissance_e6'
	];

	public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }
}
