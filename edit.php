<?php
require_once 'includes/header.php';
require_once 'includes/User.php';
require_once 'includes/UserManager.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$userManager = new UserManager();
$user = $userManager->read($_GET['id']);

if (!$user) {
    header("Location: index.php?message=Utilisateur non trouvé");
    exit();
}

$message = '';
$firstName = $user->getFirstName();
$name = $user->getName();
$email = $user->getEmail();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['firstName']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (!empty($firstName) && !empty($name) && !empty($email)) {
        try {
            $user->setFirstName($firstName);
            $user->setName($name);
            $user->setEmail($email);
            $userManager->update($user);

            header("Location: index.php?message=Utilisateur mis à jour avec succès");
            exit();
        } catch (Exception $e) {
            $message = "Erreur : " . $e->getMessage();
        }
    } else {
        $message = "Veuillez remplir tous les champs";
    }
}
?>

<h2>Modifier l'Utilisateur</h2>

<?php if ($message): ?>
    <div class="message"><?= htmlspecialchars($message) ?></div>
<?php endif; ?>

<form method="POST">
    <input type="hidden" name="id" value="<?= $user->getId() ?>">

<div class="form-group">
        <label for="firstName">Prénom :</label>
        <input type="text" id="firstName" name="firstName" value="<?= htmlspecialchars($firstName) ?>" required>
    </div>
    
    <div class="form-group">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
    </div>

    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
    </div>

    <div class="form-group">
        <input type="submit" value="Mettre à jour">
    </div>
</form>

<?php require_once 'includes/footer.php'; ?>