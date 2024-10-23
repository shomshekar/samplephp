<?php require base_path("views/partials/head.php");?>

<?php require base_path("views/partials/nav.php");?>

<?php require base_path("views/partials/banner.php");?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    
    <p class="mb-6"><a href="<?php echo $config['base_url'];?>notes" class="text-blue-500 hover:underline">Go Back...</a></p>
    <p><?php echo htmlspecialchars($note['body']);?></p>
    
    <footer class="mt-6">
      <a href="<?php echo $config['base_url'].'note/edit?id='.$note['id'];?>" class="text-blue-500 hover:underline">Edit</a>
    </footer>
  </div>
</main>

<?php require base_path("views/partials/footer.php");?>