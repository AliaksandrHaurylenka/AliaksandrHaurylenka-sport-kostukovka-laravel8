<!--Newsletter-->
<section class="mt-5 wow fadeIn">

    <!--/ Card -->
    <div class="card card-body pb-0">
        <div class="single-post">

            <h6 class="h6-responsive font-weight-bold dark-grey-text text-center spacing grey lighten-4 py-2 mb-4">
                <strong>НОВОСТНАЯ РАССЫЛКА</strong>
						</h6>
            
            <!-- Default form login -->
			    <form action="/subscribe" method="post">
						@csrf
			      <!-- Default input email -->
			      <label for="defaultFormEmailEx" class="grey-text">Email</label>
			      <input type="email" name="email" id="defaultFormEmailEx" class="form-control" required>

			      <div class="text-center mt-4">
			        <button class="btn btn-grey btn-block mb-4 mt-4" type="submit">Подписаться</button>
			      </div>
			    </form>
			    <!-- Default form login -->

        </div>
    </div>

</section>
<!--Newsletter-->