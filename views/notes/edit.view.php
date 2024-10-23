<?php require base_path("views/partials/head.php");?>

<?php require base_path("views/partials/nav.php");?>

<?php require base_path("views/partials/banner.php");?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    
    <form method="POST" class="block w-1/2" action="<?php echo $config['base_url'].'note'?>">
        <input type="hidden" name="_method" value="PATCH">
        <input id="note_id" name="note_id" type="hidden" value="<?php echo $note['id'];?>">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    
                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Add your note here..."><?php echo isset($_POST['body'])? $_POST['body']: $note['body']; ?></textarea>

                            <?php if(isset($errors['body'])):?>
                                <p class="text-red-500 text-xs mt-2"><?php echo $errors['body']; ?></p>
                            <?php endif;?>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="<?php echo $config['base_url'].'notes'?>" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            

        </div>
    </form>
    <form class="mt-6" method="POST" action="<?php echo $config['base_url'].'note'?>">
        <input type="hidden" name="_method" value="DELETE">
        <input id="note_id" name="note_id" type="hidden" value="<?php echo $note['id'];?>">
        <button class="text-sm text-red-500">Delete</button>
    </form>




  </div>
</main>

<?php require base_path("views/partials/footer.php");?>