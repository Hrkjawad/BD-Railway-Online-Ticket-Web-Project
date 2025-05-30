<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Privacy Policy - Bangladesh Railway</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
    background-color: #f9f8f6 !important;
}
      .rules{
          color: #b34d1e;
          font-weight: 600;
      }
      
.logo {
    width: 60px;
}

.navbar {
    background-color: white;
}

.nav-item {
    background-color: #D9D9D9;
    border-radius: 50px;
    margin: 10px;
    padding: 2px;
    font-weight: 500;
}

.nav-item:hover {
    background-color: #09783e;
}

.nav-item:hover .nav-link {
    color: white !important;
}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm">
      <div class="container-fluid">
        <img class="logo" src="img/logo.png" alt="Bangladesh Railway Logo" />
        <header class="site-title"><h1>Bangladesh Railway</h1></header>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <?php
session_start();
$nid = isset($_SESSION['nid']) ? $_SESSION['nid'] : null;
?>
<ul class="navbar-nav ms-auto">
    <li class="nav-item">
        <a class="nav-link" href="search_ticket.php">Search Tickets</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="privacy_policy.php">Privacy Policy</a>
    </li>
    <?php if (isset($_SESSION['nid']) && !empty($_SESSION['nid'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="my_tickets.php">My Tickets</a>
            </li>
            <?php endif; ?>
     <li class="nav-item">
        <a class="nav-link" href="<?php echo isset($_SESSION['nid']) && !empty($_SESSION['nid']) ? 'logout.php' : 'login.php'; ?>">
            <?php echo isset($_SESSION['nid']) && !empty($_SESSION['nid']) ? "NID: $nid | Logout" : 'Login'; ?>
        </a>
    </li>
</ul>
        </div>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#collapsibleNavbar"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
    <div class="container mt-5">
      <article>
We, at Bangladesh Railway and , ensure to maintain the highest standards of transactional security and quality so that your information and details are secure. To know more about our policies please read the following to learn about our information gathering and dissemination practices. </p><p><b>Note:</b> Kindly note that our privacy policy is subject to change at any time without prior notice. To ensure that you are aware of any changes, please review this policy at regular intervals. </p><p> By visiting this Application/App, you agree to be bound by the terms and conditions of this Privacy Policy. Any disagreement will be subject to the jurisdiction of Bangladesh. </p><p> By mere use of the Application/App, you express consent to our use and disclosure of your personal information in accordance with this Privacy Policy. This Privacy Policy is incorporated into and subject to the Terms of Use </p><p  class="rules"> 1. Collection of Personally Identifiable Information and other Information </p><p> When you use our Application/App, we store your browsing information so that we can provide services and features that meet your needs. </p><p > In general, you can browse the Application/App without telling us who you are or revealing any personal information about yourself. Once you give us your personal information, you are not anonymous to us. You always have the option to not provide information by choosing not to use a particular service or feature on the Application/App. We compile your usage behavior and personal information and the information on an aggregate basis for internal research to better enhance our product offerings to serve you better. This information may include the URL that you just came from (whether this URL is on our Application/App or not), which URL you next go to (whether this URL is on our Application/App or not), your computer browser information, and your IP address. </p><p  > We use data collection devices such as "cookies (small file stored on your computer)" on certain pages of the Application/App to help analyze our web page flow, measure promotional effectiveness, and promote trust and safety. We offer certain features that are only available through the use of a "cookie". </p><p > Additionally, third parties may also place cookies or similar devices on our Application/App, which we cannot control. If you choose to buy on the Application/App, we collect information about your buying behavior. </p><p  > If you transact with us, we collect some additional information, such as a billing address, a credit/debit card number and a credit/debit card expiration date and/ or other payment instrument details. If you post messages or leave feedback for us, we will collect that information you provide to us. We retain this information as necessary to resolve disputes, provide customer support and troubleshoot problems as permitted by law. </p><p > If you send us personal correspondence, such as emails or letters, or if other users or third parties send us correspondence about your activities or postings on the Application/App, we may collect such information into a file specific to you. </p><p  > We collect personally identifiable information (email address, name, phone number, NID) from you when you set up a free account with us. However, data protection is a matter of trust and your privacy is important to us. We shall therefore use your name and other information which relates to you in the manner set out in this Privacy Policy. We will only collect information where it is necessary for us to do so and we will only collect information. </p><p  class="rules"> 2. Sharing of personal information </p><p  > We will only share personal information with companies, organizations or individuals outside the periphery of Bangladesh Railway and  if we have a good-faith and believe that access, use, preservation or disclosure of the information is reasonably necessary to: </p><p > meet any applicable law, regulation, legal process or enforceable governmental request. enforce applicable Terms of Service, including investigation of potential violations, detect, prevent, or otherwise address fraud, security or technical issues. Protect against harm to the rights, property or safety of Bangladesh Railway and , our users or the public as required or permitted by law. </p><p  > We may share aggregated, non-personally identifiable information publicly and with our partners – like bus operators, agents or connected sites. For example, we may share information publicly to show trends about the general use of our services. We may also share consolidated information provided by like-minded users 3rd parties without ever taking individual names, email ids or other contact details. </p><p > If Bangladesh Railway and  is involved in a merger, acquisition or asset sale, we will continue to ensure the confidentiality of your personal information and give notice before personal information is transferred or becomes subject to a different privacy policy. </p><p  class="rules pt-4"> 3. Collecting and Using Your Personal Data </p><p  > Information Collected while Using the Application While using Our Application, in order to provide features of Our Application, We may collect, with your prior permission: </p><p > Information regarding your location </p><p  > Information from your Device's phone book (contacts list) Pictures and other information from your Device's camera and photo library. </p><p > We use this information to provide features of Our Service, to improve and customize Our Service. The information may be uploaded to the Company's servers and/or it may be simply stored on your device. </p><p  > You can enable or disable access to this information at any time, through Your Device settings. We don’t store or share any of your personal data to any other third-party channel. Your data security is important to us and we only process this data through Bangladesh Railway and  own channel to ensure features of our services. </p><p > If you have any questions about this Privacy Policy, you can contact us by email: <a  href="mailto:support@eticket.railway.gov.bd" class="email">support@eticket.railway.gov.bd</a></p><p  class="rules pt-4"> 4. Security Precautions </p><p  > Our Application/App has stringent security measures in place to protect the loss, misuse, and alteration of the information under our control. Whenever you change or access your account information, we offer the use of a secure server. As informed earlier in this policy, once we receive your information, we ensure strict security guidelines to protect it against unauthorized access. For example, we use SSL security to protect users against identity theft &amp; spyware. </p><p  class="rules"> 5. Your Consent </p><p  > By using the Application/App and/ or by providing your information, you consent to the collection and use of the information you disclose on the Application/App in accordance with this Privacy Policy, including but not limited to your consent for sharing your information as per this privacy policy. </p><p > We may decide to make amends to this privacy policy without prior information, therefore, it is suggested you review this page at regular intervals. This ensures you are up-to-date with the details of the information we collect, how we use it, and under what circumstances we disclose it.
      </article>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>


