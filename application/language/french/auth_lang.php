<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login
$lang['login_heading']         = 'Informez des disponibilités et gérez vos réservations en ligne';
$lang['login_subheading']      = 'Veuillez vous identifier ...';
$lang['login_subheading_1']      = '... ou créer un compte';
$lang['login_identity_label']  = '<span class="log_label">Identifiant</span><span class="etoile">*</span>';
$lang['login_password_label']  = '<span class="log_label">Mot de passe</span><span class="etoile">*</span>';
$lang['login_remember_label']  = 'Se souvenir de moi';
$lang['login_submit_btn']      = 'Envoyer';
$lang['login_forgot_password'] = 'Mot de passe oublié?';

// Index
$lang['index_heading']           = 'Utilisateurs';
$lang['index_subheading']        = 'Liste des utilisateurs';
$lang['index_fname_th']          = 'Nom';
$lang['index_lname_th']          = 'Prenom';
$lang['index_full_name_th']       = 'Utilisateur'; //CRA
$lang['index_email_th']          = 'Email'; //CRA : 'Email'; 
$lang['index_groups_th']         =  'Rôle(s)'; //CRA : 'Groups';
$lang['index_status_th']         = 'Statut';
$lang['index_action_th']         = 'Action';
$lang['index_active_link']       = 'Activer';
$lang['index_inactive_link']     = 'Désactiver';
$lang['index_create_user_link']  = 'Créer un nouveau utilisateur';
$lang['index_create_group_link'] = 'Créer un nouveau group';

// Deactivate User
$lang['deactivate_heading']                  = 'Désactiver un utilisateur';
$lang['deactivate_subheading']               = 'Etes-vous sûr de vouloir désactiver \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Oui:';
$lang['deactivate_confirm_n_label']          = 'Non:';
$lang['deactivate_submit_btn']               = 'Désactiver';
$lang['deactivate_validation_confirm_label'] = 'confirmation';
$lang['deactivate_validation_user_id_label'] = 'user ID';

// Create User
$lang['create_user_heading']                           = 'Créer un utilisateur';
$lang['create_user_subheading']                        = 'Veuillez remplir les champs suivantes :';
$lang['create_user_fname_label']                       = 'Prénom:<span class="etoile">*</span>';
$lang['create_user_lname_label']                       = 'Nom:<span class="etoile">*</span>';
$lang['create_user_company_label']                     = 'Nom de la compagnie:';
$lang['create_user_email_label']                       = 'Email:<span class="etoile">*</span>';
$lang['create_user_phone_label']                       = 'Phone:';
$lang['create_user_password_label']                    = 'Mot de Passe:<span class="etoile">*</span>';
$lang['create_user_password_confirm_label']            = 'Confirmer Mot de Passe:<span class="etoile">*</span>';
$lang['create_user_submit_btn']                        = 'Ajouter';
$lang['create_user_validation_fname_label']            = 'Nom';
$lang['create_user_validation_lname_label']            = 'Prénom';
$lang['create_user_validation_email_label']            = 'Email';
$lang['create_user_validation_phone1_label']           = 'First Part of Phone';
$lang['create_user_validation_phone2_label']           = 'Second Part of Phone';
$lang['create_user_validation_phone3_label']           = 'Third Part of Phone';
$lang['create_user_validation_company_label']          = 'Company Name';
$lang['create_user_validation_password_label']         = 'Password';
$lang['create_user_validation_password_confirm_label'] = 'Password Confirmation';

// Edit User
$lang['edit_user_heading']                           = "Modification d'un utilisateur";
$lang['edit_user_subheading']                        = 'Please enter the users information below.';
$lang['edit_user_fname_label']                       = 'Prénom:';
$lang['edit_user_lname_label']                       = 'Nom:';
$lang['edit_user_company_label']                     = 'Company Name:';
$lang['edit_user_email_label']                       = 'Email (Login):';
$lang['edit_user_phone_label']                       = 'Phone:';
$lang['edit_user_password_label']                    = 'Mot de passe: (si changement de mot de passe)';
$lang['edit_user_password_confirm_label']            = 'Confirmation de mot de passe: (si changement de mot de passe)';
$lang['edit_user_groups_heading']                    = 'Rôle(s)'; //'Member of groups';
$lang['edit_user_submit_btn']                        = 'Valider'; //'Save User';
$lang['edit_user_cancel_btn']                        = 'Annuler';
$lang['edit_user_validation_fname_label']            = 'Prénom';
$lang['edit_user_validation_lname_label']            = 'Nom';
$lang['edit_user_validation_email_label']            = 'Email';
$lang['edit_user_validation_phone1_label']           = 'First Part of Phone';
$lang['edit_user_validation_phone2_label']           = 'Second Part of Phone';
$lang['edit_user_validation_phone3_label']           = 'Third Part of Phone';
$lang['edit_user_validation_company_label']          = 'Company Name';
$lang['edit_user_validation_groups_label']           = 'Groupes';
$lang['edit_user_validation_password_label']         = 'Mot de passe';
$lang['edit_user_validation_password_confirm_label'] = 'Confirmation de mot de passe';

// Create Group
$lang['create_group_title']                  = 'Create Group';
$lang['create_group_heading']                = 'Create Group';
$lang['create_group_subheading']             = 'Please enter the group information below.';
$lang['create_group_name_label']             = 'Group Name:';
$lang['create_group_desc_label']             = 'Description:';
$lang['create_group_submit_btn']             = 'Create Group';
$lang['create_group_validation_name_label']  = 'Group Name';
$lang['create_group_validation_desc_label']  = 'Description';

// Edit Group
$lang['edit_group_title']                  = 'Edit Group';
$lang['edit_group_saved']                  = 'Group Saved';
$lang['edit_group_heading']                = 'Edit Group';
$lang['edit_group_subheading']             = 'Please enter the group information below.';
$lang['edit_group_name_label']             = 'Group Name:';
$lang['edit_group_desc_label']             = 'Description:';
$lang['edit_group_submit_btn']             = 'Save Group';
$lang['edit_group_validation_name_label']  = 'Group Name';
$lang['edit_group_validation_desc_label']  = 'Description';

// Change Password
$lang['change_password_heading']                               = 'Change Password';
$lang['change_password_old_password_label']                    = 'Old Password:';
$lang['change_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['change_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['change_password_submit_btn']                            = 'Change';
$lang['change_password_validation_old_password_label']         = 'Old Password';
$lang['change_password_validation_new_password_label']         = 'New Password';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirm New Password';

// Forgot Password
$lang['forgot_password_heading']                 = 'Mot de passe oubli&eacute;';
$lang['forgot_password_subheading']              = 'Veuillez entrer votre %s pour qu\'on puisse vous envoyer un mail pour r&eacute;initialiser votre compte';
$lang['forgot_password_email_label']             = '%s :';
$lang['forgot_password_submit_btn']              = 'Envoyer';
$lang['forgot_password_validation_email_label']  = 'Email';
$lang['forgot_password_username_identity_label'] = 'Pseudo';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'Aucun utilisateur ayant cette adresse e-mail dans la base';

// Reset Password
$lang['reset_password_heading']                               = 'Changer le mot de passe';
$lang['reset_password_new_password_label']                    = 'Nouveau mot de passe (au moins %s caractères) :';
$lang['reset_password_new_password_confirm_label']            = 'Confirmer le mot de passe :';
$lang['reset_password_submit_btn']                            = 'Changer';
$lang['reset_password_validation_new_password_label']         = 'Nouveau Mot de passe';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirmation du nouveau Mot de passe';

//Activation
$lang['activation_password_heading']                          = 'Activer votre compte';
$lang['activation_password_submit_btn']                        = 'Activer';

// Activation Email
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';


// Forgot Password Email
$lang['email_forgot_password_heading']    = 'R&eacute;initialiser le mot de passe  pour : <br> %s';
$lang['email_forgot_password_subheading'] = 'Veuillez cliquer sur ce lien pour %s.';
$lang['email_forgot_password_link']       = 'R&eacute;initialiser votre mot de passe';
$lang['email_forgot_password_send'] = 'Un e-mail a &eacute;t&eacute; envoy&eacute; pour r&eacute;initialiser votre mot de passe';
$lang['email_forgot_password_not_found'] = 'E-mail non trouv&eacute;';
$lang['email_forgot_password_empty'] = 'L\'adresse e-mail est obligatoire';
// New Password Email
$lang['email_new_password_heading']    = 'Nouveau mot de passe pour %s';
$lang['email_new_password_subheading'] = 'Votre mot de passe a été réinitialisé à: %s';

//Reset password
$lang['email_reset_password_password_empty'] = 'Le mot de passe est obligatoire';
$lang['email_reset_password_new_password_empty'] = 'La confirmation du mot de passe est obligatoire';
$lang['email_reset_password_finish'] = 'Mot de passe mis &agrave; jour';
$lang['email_reset_password_error'] = 'Erreur d\'enregistrement. Merci de redemander votre mot de passe.';

