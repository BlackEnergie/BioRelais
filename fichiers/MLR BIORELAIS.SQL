
# -----------------------------------------------------------------------------
#       table : utilisateur
# -----------------------------------------------------------------------------

create table if not exists utilisateur
 (
   mail varchar(32) not null  ,
   mdp varchar(20) not null  ,
   nom char(32) null  ,
   prenom char(32) null  
   , primary key (mail) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : commande
# -----------------------------------------------------------------------------

create table if not exists commande
 (
   mail varchar(32) not null  ,
   numcommande varchar(3) not null  ,
   annee char(4) not null  ,
   numerosemaine char(32) not null  
   , primary key (mail,numcommande) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : producteur
# -----------------------------------------------------------------------------

create table if not exists producteur
 (
   mail varchar(32) not null  ,
   adresse varchar(128) not null  ,
   ville varchar(20) not null  ,
   description varchar(128) null  ,
   mdp varchar(20) not null  ,
   nom char(32) null  ,
   prenom char(32) null  
   , primary key (mail) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : produit
# -----------------------------------------------------------------------------

create table if not exists produit
 (
   codeproduit char(4) not null  ,
   codecateg varchar(3) not null  ,
   mail varchar(32) not null  ,
   nomproduit varchar(128) null  ,
   descriptif varchar(128) null  ,
   unite char(4) null  
   , primary key (codeproduit) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : adherent
# -----------------------------------------------------------------------------

create table if not exists adherent
 (
   mail varchar(32) not null  ,
   mdp varchar(20) not null  ,
   nom char(32) null  ,
   prenom char(32) null  
   , primary key (mail) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : semaine
# -----------------------------------------------------------------------------

create table if not exists semaine
 (
   annee char(4) not null  ,
   numerosemaine char(32) not null  ,
   datedebutcommande date null  ,
   datefincommande date null  ,
   datedebutsaisieproduits char(32) null  ,
   datefinsaisieproduits char(32) null  ,
   datevente char(32) null  
   , primary key (annee,numerosemaine) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : categorie_produit
# -----------------------------------------------------------------------------

create table if not exists categorie_produit
 (
   codecateg varchar(3) not null  ,
   libellecateg varchar(15) not null  
   , primary key (codecateg) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : proposer
# -----------------------------------------------------------------------------

create table if not exists proposer
 (
   codeproduit char(4) not null  ,
   annee char(4) not null  ,
   numerosemaine char(32) not null  ,
   quantite integer(3) not null  ,
   prix decimal(4,2) not null  
   , primary key (codeproduit,annee,numerosemaine) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : contenir
# -----------------------------------------------------------------------------

create table if not exists contenir
 (
   mail varchar(32) not null  ,
   numcommande varchar(3) not null  ,
   codeproduit char(4) not null  ,
   quantite smallint(1) not null  
   , primary key (mail,numcommande,codeproduit) 
 ) 
 comment = "";


# -----------------------------------------------------------------------------
#       creation des references de table
# -----------------------------------------------------------------------------


alter table commande 
  add foreign key fk_commande_adherent (mail)
      references adherent (mail) ;


alter table commande 
  add foreign key fk_commande_semaine (annee,numerosemaine)
      references semaine (annee,numerosemaine) ;


alter table producteur 
  add foreign key fk_producteur_utilisateur (mail)
      references utilisateur (mail) ;


alter table produit 
  add foreign key fk_produit_categorie_produit (codecateg)
      references categorie_produit (codecateg) ;


alter table produit 
  add foreign key fk_produit_producteur (mail)
      references producteur (mail) ;


alter table adherent 
  add foreign key fk_adherent_utilisateur (mail)
      references utilisateur (mail) ;


alter table proposer 
  add foreign key fk_proposer_produit (codeproduit)
      references produit (codeproduit) ;


alter table proposer 
  add foreign key fk_proposer_semaine (annee,numerosemaine)
      references semaine (annee,numerosemaine) ;


alter table contenir 
  add foreign key fk_contenir_commande (mail,numcommande)
      references commande (mail,numcommande) ;


alter table contenir 
  add foreign key fk_contenir_produit (codeproduit)
      references produit (codeproduit) ;

