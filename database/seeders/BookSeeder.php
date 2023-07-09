<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'image' => '/storage/images/books/siksa-neraka.jpeg',
            'slug' => uniqid(),
            'title' => 'siksa neraka',
            'synopsis' => '"Sebuah perjalanan penuh petualangan dan keberanian dalam mencari jati diri dan menghadapi tantangan hidup.',
            'description' => '"Buku ini adalah sebuah karya yang menggugah pikiran, mengajak pembaca merenung, dan memperluas wawasan tentang kehidupan dan manusia."
            "Dengan gaya penulisan yang indah dan penuh imajinasi, buku ini berhasil menciptakan dunia yang memikat dan tak terlupakan bagi para pembacanya."',
            'author' => 'Tatang Sutarma',
            'publisher' => 'PT. Gramedia Indotama',
            'price' => 100000
        ]);

        DB::table('books')->insert([
            'image' => '/storage/images/books/mqdefault.jpg',
            'slug' => uniqid(),
            'title' => 'Ilmu Pengetahuan Alam',
            'synopsis' => '
            Buku "Ilmu Pengetahuan Alam" adalah sebuah karya yang mengeksplorasi keajaiban alam dan fenomena yang ada di sekitar kita. Dalam buku ini, pembaca akan dibawa dalam petualangan mempelajari berbagai aspek ilmu pengetahuan alam yang mencakup geologi, meteorologi, biologi, ekologi, dan banyak lagi.

            Buku ini memberikan penjelasan yang komprehensif tentang bagaimana alam bekerja dan bagaimana segala sesuatu saling terhubung di dalamnya. Dari formasi gunung yang megah hingga siklus air yang tak kenal lelah, pembaca akan mendapatkan wawasan mendalam tentang proses alami yang mengatur planet ini.
            
            Selain itu, "Ilmu Pengetahuan Alam" juga membahas keanekaragaman hayati dan ekosistem yang memengaruhi kehidupan di Bumi. Pembaca akan mempelajari tentang interaksi kompleks antara organisme hidup, lingkungan, dan faktor-faktor eksternal yang memengaruhi keseimbangan alam.
            
            Buku ini ditulis dengan bahasa yang jelas dan mudah dipahami, sehingga cocok untuk pembaca dari berbagai latar belakang pengetahuan. Pembaca akan menemukan ilmu pengetahuan alam tidak hanya menarik, tetapi juga relevan dengan kehidupan sehari-hari. Buku ini memaparkan bagaimana pemahaman tentang alam dapat membantu kita menjaga dan melestarikan lingkungan kita.
            
            "Ilmu Pengetahuan Alam" merupakan sumber pengetahuan yang berharga bagi siapa saja yang ingin menggali lebih dalam tentang keindahan dan kompleksitas alam semesta ini. Dengan penjelasan yang kaya dan ilustrasi yang memukau, buku ini mengajak pembaca untuk memandang dunia dengan mata yang baru dan menghargai keajaiban ilmu pengetahuan alam yang ada di sekeliling kita
            ',
            'description' => 'Buku "Ilmu Pengetahuan Alam" adalah sebuah panduan yang komprehensif tentang berbagai aspek ilmu pengetahuan alam. Buku ini menawarkan penjelasan yang terperinci dan ilustrasi yang menarik untuk membantu pembaca memahami konsep-konsep fundamental dalam ilmu pengetahuan alam.

            Dalam buku ini, pembaca akan diperkenalkan pada berbagai disiplin ilmu pengetahuan alam seperti fisika, kimia, biologi, geologi, astronomi, dan ekologi. Setiap topik dijelaskan dengan cara yang jelas dan mudah dipahami, tanpa mengorbankan keakuratan dan kecermatan ilmiah.
            
            Buku ini menjelajahi berbagai fenomena alam, mulai dari pergerakan planet di tata surya, hingga proses evolusi dan keanekaragaman hayati. Pembaca akan mempelajari tentang interaksi kompleks antara unsur-unsur alam dan bagaimana hal itu memengaruhi lingkungan dan kehidupan di Bumi.
            
            Selain itu, buku ini juga mengangkat isu-isu penting seperti perubahan iklim, konservasi sumber daya alam, dan upaya pelestarian lingkungan. Pembaca akan diberikan pemahaman yang mendalam tentang tantangan yang dihadapi oleh alam dan pentingnya menjaga keseimbangan ekosistem.
            
            Deskripsi yang jelas dan terperinci dalam buku ini membuatnya menjadi sumber pengetahuan yang sangat berharga untuk siswa, mahasiswa, dan siapa pun yang tertarik dengan ilmu pengetahuan alam. Buku ini tidak hanya memberikan pemahaman yang mendalam, tetapi juga mendorong pembaca untuk mengembangkan rasa keingintahuan dan kesadaran tentang alam yang mengelilingi kita.
            
            Dengan gaya penulisan yang ramah pembaca dan ilustrasi yang menarik, "Ilmu Pengetahuan Alam" adalah panduan yang sempurna untuk menjelajahi keajaiban dan kompleksitas alam semesta ini. Buku ini akan memperkaya pengetahuan Anda tentang dunia di sekitar kita dan mendorong Anda untuk memandang alam dengan penghargaan yang lebih dalam.',
            'author' => 'Prof. Andara',
            'publisher' => 'PT. Gramedia Indonesia',
            'price' => 250000
        ]);

        DB::table('books')->insert([
            'image' => '/storage/images/books/19021605.jpg',
            'slug' => uniqid(),
            'title' => 'Naruto',
            'synopsis' => '
            Komik Naruto, karya Masashi Kishimoto, adalah sebuah kisah petualangan yang mengikuti perjalanan seorang ninja muda bernama Naruto Uzumaki. Sinopsi komik Naruto dapat diuraikan sebagai berikut:

Naruto Uzumaki, seorang anak yatim piatu yang penuh semangat, bertekad untuk menjadi Hokage, pemimpin desa ninja terkuat di desanya. Namun, Naruto memiliki rahasia yang dia sembunyikan dari orang lain: dia adalah rumah bagi "Kyuubi" atau Rubah Sembilan Ekor, seekor makhluk legendaris dengan kekuatan yang dahsyat.

Komik Naruto memperlihatkan perjalanan Naruto dalam belajar keterampilan ninja, menghadapi berbagai tantangan, dan mengembangkan ikatan dengan teman-teman sejawatnya seperti Sasuke Uchiha dan Sakura Haruno. Mereka bersama-sama membentuk Tim 7 yang dipimpin oleh Kakashi Hatake, seorang ninja legendaris.

Saat Naruto berjuang untuk menjadi lebih kuat dan diakui oleh orang lain, dia menghadapi berbagai musuh yang kuat, termasuk organisasi jahat bernama Akatsuki. Dalam perjalanan ini, Naruto harus menghadapi rintangan fisik dan emosional yang menguji tekadnya, menghadapi kehilangan yang menyakitkan, dan menemukan makna sejati dari persahabatan dan kekuatan.

Dengan aksi pertempuran yang spektakuler, kekuatan ninja yang unik, dan alur cerita yang mendalam, komik Naruto menawarkan petualangan yang menghibur dan menginspirasi. Ini adalah kisah tentang keberanian, persahabatan, pengorbanan, dan bagaimana seseorang dapat mengubah takdir mereka dengan tekad dan kerja keras.

Komik Naruto telah mendapatkan popularitas global karena karakter yang kuat, alur yang menarik, serta pesan-pesan positif yang disampaikannya. Dalam perjalanan Naruto, pembaca diajak untuk merenung tentang kehidupan, kebaikan, dan arti menjadi diri sendiri di tengah dunia yang kompleks dan penuh tantangan.',

            'description' => 'Komik Naruto adalah sebuah karya manga yang ditulis dan diilustrasikan oleh Masashi Kishimoto. Menggabungkan elemen-elemen aksi, petualangan, dan fantasi, komik Naruto telah menjadi salah satu manga paling populer dan ikonik di dunia.

            Deskripsi tentang komik Naruto dapat diuraikan sebagai berikut:
            
            Kisah Penuh Petualangan: Komik Naruto mengikuti perjalanan Naruto Uzumaki, seorang ninja muda yang memiliki ambisi besar untuk menjadi Hokage, pemimpin desa ninja Konohagakure. Di tengah perjalanan ini, pembaca dibawa melalui berbagai petualangan dan pertempuran yang menegangkan.
            
            Karakter yang Beragam: Salah satu daya tarik utama komik Naruto adalah karakter-karakternya yang kuat dan beragam. Selain Naruto sendiri, pembaca akan bertemu dengan karakter-karakter menarik seperti Sasuke Uchiha, Sakura Haruno, Kakashi Hatake, dan banyak lagi. Setiap karakter memiliki latar belakang, kekuatan, dan tantangan pribadi mereka sendiri.
            
            Sistem Kekuatan Ninja: Komik Naruto juga dikenal dengan penggambaran yang detail dan menarik tentang sistem kekuatan ninja. Pembaca akan mempelajari tentang teknik dan jurus khusus yang dimiliki oleh para ninja, seperti Jutsu, Genjutsu, dan Taijutsu. Konsep ini menambah dimensi aksi dan strategi dalam cerita.
            
            Alur Cerita yang Mendalam: Alur cerita komik Naruto menawarkan kombinasi yang sempurna antara aksi, drama, dan emosi. Pembaca akan terlibat dalam intrik politik, konflik antar-desa, dan perjalanan karakter utama yang penuh dengan penderitaan, pertumbuhan, dan penebusan.
            
            Pesan-Pesan Penuh Makna: Di balik aksi dan pertempuran yang mengagumkan, komik Naruto juga menyampaikan berbagai pesan penuh makna. Ini termasuk pentingnya persahabatan, tekad yang kuat, pengorbanan untuk orang lain, dan kepercayaan pada diri sendiri. Komik ini mendorong pembaca untuk merenungkan nilai-nilai ini dan mengaplikasikannya dalam kehidupan sehari-hari.
            
            Komik Naruto telah berhasil menciptakan dunia yang kaya dengan karakter yang menarik, alur cerita yang mendalam, dan pesan moral yang berarti. Dengan imajinasi yang kreatif dan penggambaran yang cemerlang, komik Naruto terus menjadi salah satu karya manga yang sangat dihormati dan dinikmati oleh jutaan pembaca di seluruh dunia.',
            'author' => 'Masashi Kisimoto',
            'publisher' => 'PT. Komik Indonesia',
            'price' => 100000
        ]);

        DB::table('books')->insert([
            'image' => '/storage/images/books/kenny-eliason-ch_z2RsV7uc-unsplash.jpg',
            'slug' => uniqid(),
            'title' => 'E-Bisnis',
            'synopsis' => '
            Buku bisnis adalah jenis buku yang dirancang untuk memberikan wawasan dan pengetahuan tentang dunia bisnis, manajemen, kewirausahaan, pemasaran, dan berbagai aspek lain yang terkait dengan kegiatan komersial. Sinopsis tentang buku bisnis dapat diuraikan sebagai berikut:

Buku bisnis adalah sumber informasi yang berharga bagi mereka yang tertarik dengan dunia bisnis dan ingin mengembangkan pemahaman mereka tentang strategi, praktik, dan konsep yang mendasari keberhasilan organisasi dan pengusaha.

Dalam buku ini, pembaca akan dipandu melalui berbagai topik penting seperti manajemen sumber daya manusia, keuangan, pemasaran, operasi, dan kepemimpinan. Para penulis buku bisnis berbagi pengetahuan dan pengalaman mereka yang kaya melalui contoh kasus nyata, studi kasus, dan penelitian terkini.

Buku bisnis juga memberikan wawasan tentang tren bisnis yang sedang berkembang, seperti transformasi digital, inovasi teknologi, pengembangan merek, dan strategi pertumbuhan. Pembaca akan mempelajari bagaimana menghadapi tantangan di era globalisasi yang terus berubah dan berkembang.

Selain itu, buku bisnis juga membahas pentingnya keterampilan kepemimpinan, pengembangan diri, komunikasi efektif, dan manajemen waktu. Pembaca akan diajak untuk merenung tentang etika bisnis, tanggung jawab sosial perusahaan, dan pentingnya mempertimbangkan dampak bisnis terhadap masyarakat dan lingkungan.

Buku bisnis tidak hanya relevan bagi mereka yang ingin memulai bisnis mereka sendiri, tetapi juga bagi mereka yang ingin memperluas pengetahuan mereka tentang bagaimana organisasi beroperasi dan berkembang dalam konteks yang semakin kompleks dan dinamis.

Dengan penjelasan yang jelas, ilustrasi yang tepat, dan contoh yang relevan, buku bisnis menawarkan wawasan praktis dan teoritis yang dapat membantu pembaca mengembangkan keterampilan dan pengetahuan mereka dalam dunia bisnis.

Dengan membaca buku bisnis, pembaca akan diberikan alat dan strategi yang berguna untuk menghadapi tantangan bisnis, mengoptimalkan operasi, meningkatkan keunggulan kompetitif, dan mencapai keberhasilan jangka panjang. Buku bisnis menjadi panduan berharga bagi mereka yang ingin sukses di dunia bisnis yang kompetitif dan terus berkembang.',

            'description' => 'Buku bisnis adalah sumber pengetahuan yang kaya dan komprehensif tentang dunia bisnis dan pengelolaan organisasi. Buku-buku ini dirancang untuk memberikan wawasan mendalam tentang berbagai aspek bisnis, termasuk manajemen, keuangan, pemasaran, kewirausahaan, kepemimpinan, dan banyak lagi.

            Dalam buku bisnis, pembaca akan menemukan penjelasan yang terperinci tentang teori dan praktik terkait dengan menjalankan dan mengelola bisnis. Buku-buku ini membahas konsep-konsep penting seperti perencanaan strategis, pengambilan keputusan, analisis pasar, pengembangan produk, pengelolaan tim, dan efisiensi operasional.
            
            Buku bisnis juga membahas tren terbaru dalam dunia bisnis, termasuk transformasi digital, e-commerce, kecerdasan buatan (AI), big data, dan berbagai teknologi lainnya yang berdampak pada cara bisnis dilakukan saat ini. Pembaca akan mempelajari tentang pentingnya beradaptasi dengan perubahan dan bagaimana memanfaatkan teknologi untuk meningkatkan kinerja bisnis.
            
            Selain itu, buku bisnis juga menyoroti pentingnya keterampilan interpersonal dan kepemimpinan yang efektif. Pembaca akan memperoleh wawasan tentang bagaimana membangun tim yang sukses, memotivasi karyawan, memimpin dengan integritas, dan mengembangkan budaya kerja yang positif.
            
            Buku bisnis juga mengulas tentang strategi pemasaran yang efektif, termasuk pemasaran digital, branding, riset pasar, dan manajemen hubungan pelanggan. Pembaca akan belajar tentang pentingnya memahami pasar, memenuhi kebutuhan pelanggan, dan membangun keunggulan kompetitif dalam lingkungan bisnis yang semakin kompleks.
            
            Deskripsi buku bisnis tidak lengkap tanpa menyebutkan pentingnya etika dan tanggung jawab sosial perusahaan. Buku ini mempertimbangkan implikasi bisnis terhadap masyarakat dan lingkungan, serta menguraikan nilai-nilai etis yang harus dipegang oleh organisasi dalam menjalankan kegiatan mereka.
            
            Buku bisnis menyediakan panduan praktis, studi kasus, dan contoh nyata untuk membantu pembaca memahami konsep-konsep bisnis yang rumit. Buku-buku ini cocok untuk mahasiswa, profesional bisnis, pengusaha, dan siapa saja yang ingin memperluas pengetahuan mereka tentang dunia bisnis dan meningkatkan keterampilan mereka dalam mengelola organisasi.
            
            Dengan membaca buku bisnis, pembaca akan memiliki dasar yang kokoh untuk merencanakan, mengelola, dan mengembangkan bisnis dengan cara yang efektif, berkelanjutan, dan berdampak positif pada lingkungan sekitar.',
            'author' => 'Rizza Muhammad Arief, M.Kom., M.H',
            'publisher' => 'SmartEdu Indonesia',
            'price' => 1000000
        ]);
    }
}
