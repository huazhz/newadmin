<?
if ($_SETTINGS['home-paragraph-status-welcome2'] == 1)
{
?>
<div class="section" id="section-three">
    <div class="row">
      <div class="small-12 medium-7 large-8 columns">
        <article>
<?=unFormatData($_SETTINGS['home-paragraph-contents-welcome2'])?>

</article>
      </div>
      <div class="small-12 medium-5 large-3  columns">
        <div class="sidebar">
          <aside class="sidebar-quick-link">
            <header><i class="fa fa-link" aria-hidden="true"></i> Quick Links</header>
            <nav> <a href="#">AccessIMEDECS</a> <a href="#">FAQs</a> <a href="#">Forms</a> <a href="#">News</a> <a href="#">Resources</a> <a href="#">State/Federal Information</a> </nav>
          </aside>
          <aside class="join-us-form">
            <header>Join us to receive <br>
              our latest news!</header>
            <input type="text" placeholder="First Name" />
            <input type="text" placeholder="Last Name" />
            <input type="email" placeholder="Email Address" />
            <input class="button primary" type="submit" value="SUBMIT" />
          </aside>
        </div>
      </div>
    </div>
  </div>
  <!-- End Three --> 

<?
}
?>