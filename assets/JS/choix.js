function handleRoleSelection(role) {
    if (role === 'acheteur') {
      window.location.href = './inscription_acheteur.php';
    } else if (role === 'vendeur') {
      window.location.href = './inscription_vendeur.php';
    }
  }