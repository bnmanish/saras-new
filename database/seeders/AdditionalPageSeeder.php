<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdditionalPage;

class AdditionalPageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'id' => 1,
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'meta_title' => 'Privacy Policy',
                'meta_keywords' => 'Privacy Policy',
                'meta_description' => 'Privacy Policy',
                'description' => '<p>Saras is committed to protecting the privacy and security of your personal information. This Privacy Policy describes how we collect, use, and disclose personal information when you visit our website or use our services.</p>
<p><strong>Information We Collect:</strong></p>
<p><strong>We may collect personal information that you provide to us when you:</strong></p>
<ul>
<li>Register for an account</li>
<li>Use our services</li>
<li>Contact us for support or inquiries</li>
<li>Subscribe to our newsletter or marketing communications</li>
<li>Participate in surveys or promotions</li>
</ul>
<p><strong>The types of personal information we may collect include:</strong></p>
<ul>
<li>Name</li>
<li>Contact information (email address, phone number, mailing address)</li>
<li>Property preferences and search criteria</li>
<li>Demographic information</li>
<li>Payment information (if applicable)</li>
<li>Communications preferences</li>
</ul>
<p><strong>How We Use Your Information</strong></p>
<p><strong>We may use your personal information for the following purposes:</strong></p>
<ul>
<li>To provide and improve our services</li>
<li>To personalize your experience and tailor our offerings to your preferences</li>
<li>To communicate with you, including responding to inquiries and providing customer support</li>
<li>To send you marketing communications, newsletters, and promotional offers</li>
<li>To conduct research and analysis to better understand our users needs and improve our services</li>
<li>To comply with legal obligations and enforce our terms of service</li>
</ul>
<p><strong>Data Security</strong></p>
<p>We implement security measures to protect your personal information from unauthorized access, disclosure, alteration, or destruction. However, no method of transmission over the Internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>
<p><strong>Sharing of Information</strong></p>
<p><strong>We may share your personal information with third parties for the following purposes:</strong></p>
<p><strong>Service providers:</strong> We may share your information with third-party service providers who help us provide and improve our services, such as hosting providers, analytics providers, and payment processors.</p>
<p><br /><strong>Business partners: </strong>We may share information with trusted business partners who offer products or services that may be of interest to you.</p>
<p><br /><strong>Legal purposes:</strong> We may disclose information when required by law, court order, or other legal process, or to protect our rights or the rights of others.</p>
<p><strong>Your Choices</strong></p>
<p><strong>You have the following choices regarding your personal information:</strong></p>
<p>You can update or correct your information by accessing your account settings.<br />You can opt out of receiving marketing communications by following the unsubscribe instructions included in the communication. You can request to delete your account and personal information, subject to certain exceptions where we are required to retain information by law or for legitimate business purposes.</p>
<p><strong>Changes to This Privacy Policy</strong></p>
<p>We may update this Privacy Policy from time to time to reflect changes in our practices or legal requirements. We will notify you of any material changes by posting the updated policy on our website and updating the "last updated" date.</p>
<p><strong>Contact Us</strong></p>
<p>If you have any questions or concerns about this Privacy Policy or our practices regarding your personal information, please contact us.</p>',
                'image' => 'privacy-policy.jpg',
                'status' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Terms & Conditions',
                'slug' => 'terms-and-conditions',
                'meta_title' => 'Terms & Conditions',
                'meta_keywords' => 'Terms & Conditions',
                'meta_description' => 'Terms & Conditions',
                'description' => '<p>These Terms and Conditions ("Terms") govern your use of <strong>Saras</strong> website and any services provided therein. By accessing or using the Website, you agree to be bound by these Terms. If you do not agree to these Terms, please do not use the Website.</p>
<p><strong>Use of the Website:</strong></p>
<p><strong>Eligibility:</strong> You must be at least 18 years old to use the Website. By using the Website, you represent and warrant that you are of legal age to form a binding contract with Saras.</p>
<p><strong>Accuracy of Information:</strong> You agree to provide accurate and complete information when using the Website, including when registering for an account or submitting inquiries.</p>
<p><strong>Prohibited Activities:</strong> You agree not to engage in any of the following activities:</p>
<ul>
<li>Violating any laws or regulations</li>
<li>Using the Website in any manner that could interfere with, disrupt, or negatively affect other users\' experience</li>
<li>Attempting to gain unauthorized access to any part of the Website or its systems</li>
<li>Transmitting any viruses, malware, or other harmful code</li>
</ul>
<p><strong>Intellectual Property:</strong></p>
<p><strong>Ownership:</strong> The Website and its content, including but not limited to text, graphics, logos, and images, are owned by <strong>Saras</strong> or its licensors and are protected by copyright and other intellectual property laws.</p>
<p><strong>License:</strong> Saras grants you a limited, non-exclusive, non-transferable license to access and use the Website for personal, non-commercial purposes.</p>
<p><strong>Restrictions:</strong> You agree not to reproduce, modify, distribute, or create derivative works based on the Website or its content without the prior written consent of Saras.</p>
<p><strong>Privacy:</strong></p>
<p>By using the Website, you consent to the collection, use, and disclosure of your personal information as described in our Privacy Policy.</p>
<p><strong>Disclaimer of Warranties:</strong></p>
<p><strong>No Warranty:</strong> The Website and its content are provided on an "as is" and "as available" basis, without any warranties of any kind, express or implied.</p>
<p><strong>Use at Your Own Risk:</strong> You use the Website at your own risk. Saras does not warrant that the Website will be error-free, uninterrupted, or secure.</p>
<p><strong>Limitation of Liability:</strong></p>
<p><strong>Exclusion of Damages:</strong> In no event shall Saras be liable for any indirect, incidental, special, consequential, or punitive damages, including but not limited to lost profits, arising out of or in connection with your use of the Website.</p>
<p><strong>Total Liability:</strong> In no event shall Saras total liability to you for all damages exceed the amount paid by you, if any, for accessing or using the Website.</p>
<p><strong>Indemnification:</strong></p>
<p>You agree to indemnify and hold harmless Saras and its officers, directors, employees, and agents from and against any claims, liabilities, damages, losses, and expenses, including reasonable attorneys\' fees, arising out of or in connection with your use of the Website or violation of these Terms.</p>
<p><strong>Governing Law:</strong></p>
<p>These Terms shall be governed by and construed in accordance with the laws of India, without regard to its conflict of law principles.</p>
<p><strong>Changes to Terms:</strong></p>
<p>Saras reserves the right to update or modify these Terms at any time without prior notice. Any changes will be effective immediately upon posting on the Website. Your continued use of the Website following the posting of changes constitutes acceptance of such changes.</p>
<p><strong>Contact Us</strong></p>
<p>If you have any questions or concerns about these Terms, please contact us.</p>',
                'image' => 'terms-and-conditions.jpg',
                'status' => 1,
            ],
            [
                'id' => 3,
                'title' => 'Disclaimer',
                'slug' => 'disclaimer',
                'meta_title' => 'Disclaimer',
                'meta_keywords' => 'Disclaimer',
                'meta_description' => 'Disclaimer',
                'description' => '<p>The information provided on <strong>Saras</strong> website is for general informational purposes only. While we endeavor to keep the information up to date and accurate, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability, or availability with respect to the Website or the information, products, services, or related graphics contained on the Website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.</p>
<p><strong>Professional Advice:</strong></p>
<ul>
<li>The information provided on the Website is not intended to constitute professional advice of any kind, including but not limited to legal</li>
<li>, financial, or real estate advice. You should consult with qualified professionals in the relevant fields before making any</li>
<li>decisions or taking any actions based on the information provided on the Website.</li>
</ul>
<p><strong>Property Listings:</strong></p>
<p>Property listings displayed on the Website are provided by third-party real estate agents or brokers and are for informational purposes only. Saras does not guarantee the accuracy, completeness, or reliability of any property listings or other information provided by third parties on the Website.</p>
<p><strong>Third-Party Links:</strong></p>
<p>The Website may contain links to third-party websites or resources. These links are provided solely for your convenience and do not constitute an endorsement, sponsorship, or recommendation by Saras. We have no control over the content or availability of these sites and accept no responsibility for them or for any loss or damage that may arise from your use of them.</p>
<p><strong>Changes to Information:</strong></p>
<p>We reserve the right to modify or remove any information on the Website at any time without prior notice. We do not guarantee that the information on the Website will be up-to-date or accurate at all times.</p>
<p><strong>Limitation of Liability:</strong></p>
<p>In no event shall Saras be liable for any direct, indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly, arising from your use of the Website or reliance on any information provided on the Website.</p>
<p><strong>Governing Law:</strong></p>
<p>These disclaimers shall be governed by and construed in accordance with the laws of India, without regard to its conflict of law principles.</p>
<p><strong>Contact Us:</strong></p>
<p>If you have any questions or concerns about this disclaimer, please contact us.</p>',
                'image' => 'disclaimer.jpg',
                'status' => 1,
            ],
            [
                'id' => 4,
                'title' => 'Refund Policy',
                'slug' => 'refund-policy',
                'meta_title' => 'Refund Policy',
                'meta_keywords' => 'Refund Policy',
                'meta_description' => 'Refund Policy',
                'description' => '<p>Saras is committed to providing the best service to our customers. Our refund policy has been designed to ensure transparency and satisfaction.</p>
<p><strong>Refund Eligibility:</strong></p>
<ul>
<li>Refunds are available within 30 days of purchase</li>
<li>Items must be in original condition with all tags attached</li>
<li>Proof of purchase is required for all refund requests</li>
</ul>
<p><strong>Non-Refundable Items:</strong></p>
<ul>
<li>Items purchased during final sale promotions</li>
<li>Customized or personalized items</li>
<li>Perishable goods</li>
<li>Digital products once downloaded</li>
</ul>
<p><strong>Refund Process:</strong></p>
<p>Once your refund request is approved, the refund will be processed to your original payment method within 5-7 business days. You will receive a confirmation email once the refund has been initiated.</p>
<p><strong>Contact Us:</strong></p>
<p>If you have any questions about our refund policy, please contact our customer support team.</p>',
                'image' => 'refund-policy.jpg',
                'status' => 1,
            ],
        ];

        foreach ($pages as $page) {
            AdditionalPage::updateOrCreate(
                ['id' => $page['id']],
                $page
            );
        }
    }
}
