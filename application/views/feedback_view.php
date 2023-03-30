<?php
require_once './application/views/header.php'
?>
<main>
	<section class="login">
		<div class="form">

			<!-- <div class="text-contain">
                    <h2 class="intro-header">JOIN THE ENERGY REVOLUTION</h2>
                </div> -->
			<div class="text-contain-active">
				<div class="left-line">
					<div class="intro-header">let's do</div>
					<div class="intro-header">game</div>
					<div class="intro-header">better</div>

				</div>
			</div>
			<form method="GET" autocomplete="off" action="http://mvc/feedback/getUsers">
				<label>TELL US ABOUT YOUR SUGGESTION OR IDEA TO MAKE THE GAME BETTER</label>
				<input type="text" name="header-text" autofocus required placeholder="Header text">
				<input type="text" name="offer" required placeholder="Offer">
				<input type="hidden" name="like" value="0">
				<input type="hidden" name="view" value="0">
				<input type="submit" value="Send">

				<?php
				echo "<h3 class='text-h2'>" . "красноглазое.чмо(".$data.") нахуй" . "</h3>";
				// foreach ($data as $value) {
				// }
				?>
			</form>

		</div>
	</section>
</main>