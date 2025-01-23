<?php 

class Time {

    // Fonction pour calculer et afficher le temps écoulé depuis une certaine date ou heure donnée
    public static function getTimeElapsed($pasttime, $currentTime = null) {

        // Si l'heure actuelle n'est pas fournie, utilisez la date et l'heure actuelles
        if (!$currentTime) {
            $currentTime = new DateTime();
        } else {
            $currentTime = new DateTime($currentTime);
        }

        // Convertir la date passée en objet DateTime
        $pasttime = new DateTime($pasttime);

        // Calculer la différence entre la date passée et l'heure actuelle
        $interval = $pasttime->diff($currentTime);

        // Afficher la chaîne de temps appropriée en fonction de la différence
        if ($interval->y >= 1) {
            return $pasttime->format('F jS, Y'); // Plus d'un an
        } elseif ($interval->m >= 1) {
            return $pasttime->format('F jS, Y'); // Plus d'un mois
        } elseif ($interval->d >= 2) {
            return $pasttime->format('F jS, Y'); // Plus de deux jours
        } elseif ($interval->d == 1) {
            return '1 day, ' . $pasttime->format('h:i:s a'); // Un jour
        } elseif ($interval->h >= 1) {
            return $interval->h . ' hr, ' . $interval->i . ' min ago'; // Plus d'une heure
        } elseif ($interval->i >= 1) {
            return $interval->i . ' min ago'; // Plus d'une minute
        } else {
            return 'few seconds ago'; // Moins d'une minute
        }
    }
}
