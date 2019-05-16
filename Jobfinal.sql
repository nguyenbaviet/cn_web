-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2019 lúc 03:02 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apply`
--

CREATE TABLE `apply` (
  `idJob` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `stateapply` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `apply`
--

INSERT INTO `apply` (`idJob`, `username`, `stateapply`) VALUES
(1, 'nguyenbanam', 'Apply'),
(2, 'nguyenbanam', NULL),
(3, 'nguyenbanam', NULL),
(4, 'bestmonster', NULL),
(4, 'nguyenbanam', NULL),
(17, 'bestmonster', NULL),
(20, 'bestmonster5', 'Reject');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf32_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`Id`, `Name`) VALUES
(1, 'Partime'),
(2, 'Fulltime'),
(3, 'Intern'),
(4, 'Freelancer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job`
--

CREATE TABLE `job` (
  `Id` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `idUser` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `title` varchar(1000) COLLATE utf32_vietnamese_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `description` mediumtext COLLATE utf32_vietnamese_ci,
  `requirement` mediumtext COLLATE utf32_vietnamese_ci,
  `date` date NOT NULL,
  `deadline` date NOT NULL,
  `views` int(11) NOT NULL,
  `location` text COLLATE utf32_vietnamese_ci NOT NULL,
  `state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `job`
--

INSERT INTO `job` (`Id`, `idCategory`, `idType`, `idUser`, `title`, `salary`, `description`, `requirement`, `date`, `deadline`, `views`, `location`, `state`) VALUES
(1, 1, 1, 'tuetinhmars@gmail.com', '\r\nJava Developer', 2000000, '- Phân tích yêu cầu người dùng và lập tài liệu thiết kế chi tiết.<br/> \r\n- Lập trình ứng dụng, hệ thống theo tài liệu thiết kế chi tiết.<br/> \r\n- Đảm bảo tiến độ, chất lượng công việc và báo cáo thường xuyên tới quản lý.<br/>\r\n- Phối hợp với khách hàng để triển khai và kiểm thử hệ thống phần mềm.<br/>\r\n- Phân tích và đưa ra các giải pháp kỹ thuật cho các dự án được giao.<br/>\r\n- Tham gia xuyên suốt các công đoạn Phân tích, Thiết kế, Phát triển.<br/>\r\n- Nghiên cứu và lập luận về phương pháp hoặc công nghệ thích hợp để giải quyết vấn đề.<br/>\r\n- Phát triển core backend của sản phẩm, đảm bảo hiệu năng cao, đáp ứng yêu cầu cũng như khả năng mở rộng.', '- Tốt nghiệp ngành Công nghệ thông tin, có kinh nghiệm thực tiễn tương đương.<br/> \r\n- Thành thạo với Java Spring Boot, JPA, Hibernate, Message Queue, REST API và hiểu sâu về kiến trúc hệ thống là bắt buộc.<br/>  \r\n- Kinh nghiệm sử dụng Git. Khả năng thảo luận về cách tiếp cận, đồng thời thực hiện tốt phương án thay thế cùng team. <br/> \r\n- Kinh nghiệm debug và tối ưu hóa code cho hiệu suất ứng dụng thông qua các công cụ <br/> \r\n- Tư duy logic tốt.<br/> ', '2019-04-02', '2019-06-01', 21, 'Ha Noi', 1),
(2, 1, 14, 'tuetinhmars@gmail.com', 'Lập trình viên', 20000000, '- Là thành viên tổ kỹ thuật triển khai dự án Quản lý Quan hệ khách hàng CRM tại SHB. <br/> \r\n- Hỗ trợ đối tác trong các tác lập trình tích hợp hệ thống CRM với các hệ thống khác của ngân hàng SHB <br/> \r\n- Lập trình các chức năng theo phân công.<br/> \r\n- Thực hiện xây dựng các tài liệu, quy trình hỗ trợ, vận hành hệ thống<br/> \r\n- Thực hiện kiểm thử phần mềm theo bản phân tích và thiết kế, ghi nhận lỗi, phối hợp với các bộ phận/nhóm liên quan để xử lý lỗi theo quy trình/quy định Phát triển phần mềm/Triển khai dự án <br/> \r\n- Thực hiện các công việc khác theo phân công', '- Trình độ chuyên môn: tốt nghiệp đại học, chuyên ngành CNTT/Tài chính ngân hàng<br/> \r\n- Ưu tiên ứng viên có kiến thức về Oracle hoặc SQL Server, MVC, jQuery, HTML, CSS, Java Script, XML<br/> \r\n- Sử dụng tốt các công cụ hỗ trợ thiết kế, lập kế hoạch- Sử dụng tốt các công cụ Office<br/> \r\n- Có kỹ năng giao tiếp tốt<br/> \r\n- Có khả năng làm việc độc lập, theo nhóm, chịu áp lực công việc<br/> \r\n- Trung thực, cẩn thận, có trách nghiệm và chủ động trong công việc<br/> \r\n- Trình độ ngoại ngữ : Tiếng Anh, Yêu cầu khả năng nghe, nói, đọc, viết tốt<br/> \r\n- Ưu tiên ứng viên đã có kinh nghiệm phát triển hệ thống Quản lý khách hàng CRM hoặc các hệ thống phần mềm CNTT của Ngân hàng', '2019-04-22', '2019-04-04', 32, 'Ha Noi', 1),
(3, 2, 4, 'bestmonster1', 'Lập Trình Viên C#.net', 50000000, 'Mức lương từ 500 – 1200 USD.<br/> \r\nĐược phát triển chuyên sâu để trở thành chuyên gia lập trình C# .NET.<br/> \r\nĐược đào tạo và làm việc bởi những chuyên gia với hơn 10 năm kinh nghiệm<br/> \r\nĐược tham gia xây dựng sản phẩm lớn trong lĩnh vực y tế, tài chính, ngân hàng.<br/> \r\nĐược hưởng đầy đủ các chế độ bảo hiểm theo Luật Lao động Việt Nam (BHXH, BHYT…)<br/> \r\nMôi trường làm việc chuyên nghiệp, năng động, thân thiện', 'Yêu cầu chung:<br/>  \r\n- Yêu thích lập trình. Ưu tiên có sản phẩm đã chạy thật, có demo cụ thể.<br/> \r\n- Có kỹ năng làm việc nhóm và sẵn sàng học hỏi, chia sẻ kiến thức chuyên môn.<br/> \r\n- Ưu tiên những ứng viên có kinh nghiệm.<br/> \r\n- Có kỹ năng tìm kiếm và độc lập nghiên cứu các vấn đề liên quan đến chuyên môn, luôn sẵn sàng tiếp cận một nền tảng kỹ thuật mới.', '2019-03-02', '2019-05-29', 2, 'Ha Noi', 1),
(4, 1, 1, 'tuetinhmars@gmail.com', 'Lập Trình Viên Frontend', 250000000, 'Loại hợp đồng dự kiến sử dụng:	Thử việc 02 tháng – Chính thức 12 tháng<br/> \r\nMức lương thử việc dự kiến: Đàm phán (tối thiểu 85% lương chính)<br/> \r\nMức lương chính thức dự kiến: Lên tới 25,000,000 VND/ tháng (up to 1200$)\r\n<br/> \r\n** Mô tả công việc:<br/> \r\n- Trực tiếp tham gia các dự án lập trình web của khối công nghệ\r\n<br/> \r\n** Quyền lợi	\r\n- Thu nhập năm từ 15-17 tháng lương<br/> \r\n- Review lương 2 lần/năm<br/> \r\n- Du lịch nghỉ mát 1 lần/năm, team building 2 -3 lần/năm<br/> \r\n- Ăn trưa tại Công ty<br/> \r\n- BHXH, BHYT, BHTN theo quy định của pháp luật hiện hành.<br/> \r\n- Được thử thách trong các dự án lớn<br/> \r\n- Có cơ hội khẳng định năng lực bản thân và phát triển sự nghiệp<br/> \r\n- Môi trường làm việc thân thiện, năng động, sáng tạo, khuyến khích phát triển cá nhân', '- Tốt nghiệp đại học/cao đẳng chuyên ngành công nghệ thông tin, toán tin.<br/> \r\n- Có khả năng làm việc độc lập, nhanh nhẹn, sáng tạo và làm việc nhóm trong môi trường áp lực cao;<br/> \r\n- Có kinh nghiệm ít nhất 1 năm làm Front end bằng Angular 5 trở lên, NodeJS, có khả năng lập trình java, hiểu biết mySQL, có kiến thức về các web server jboss, tomcat, serverless.<br/>  \r\n- Có kinh nghiệm làm Front end bằng Angular core ít nhất 1 năm và làm các dự án lớn bằng Angular.<br/>  \r\n-Biết sử dụng thành thạo Eclipse, intelliJ, atom, Limtex<br/> \r\n- Có kiến thức về CSS 3<br/> \r\n- Có hiểu biết về NodeJS, Javascript<br/> \r\n- Biết sử dụng mysql<br/> \r\n- Có kiến thức về các web server jboss, tomcat, serverless<br/> \r\n- Có khả năng làm việc nhóm<br/> \r\n- Chủ động tích cực tiếp thu kiến thức mới', '2019-05-07', '2019-05-31', 20, 'Ha Noi', 0),
(5, 2, 1, 'bestmonster1', 'Phó Phòng Kế Toán', 5000000, '-	Thực hiện các công việc về kế toán xây dựng <br/> \r\n-	Theo dõi, kiểm soát, tính thuế TNDN bất động sản, thuế TNDN, GTGT<br/> \r\n-	Rà soát, kiểm tra các nghiệp vụ kế toán phát sinh vào phần mềm kế toán<br/>  \r\n-	Kiểm tra công nợ phải thu, phải trả <br/> \r\n-	Lên được báo cáo tài chính; Quyết toán thuế với cơ quan thuế<br/> \r\nChi tiết công việc sẽ trao đổi trong buổi phỏng vấn', 'Hiểu về hồ sơ thanh toán xây dựng, tính giá thành BĐS;<br/> \r\nHiểu biết chuyên sâu về các chuẩn mực cũng như các quy định liên quan đến báo cáo tài chính, kế toán, thuế...; <br/> \r\nSử dụng thành thạo các phần mềm kế toán; tin học văn phòng<br/> \r\nCó tố chất quản lý, lãnh đạo;<br/>  \r\nKhả năng chịu áp lực công việc tốt; Làm việc nhóm, độc lập tốt<br/> \r\nCam kết ổn định', '2019-05-29', '2019-05-24', 20, 'Ha Noi', 0),
(6, 2, 2, 'tuetinhmars@gmail.com', 'Cán bộ tin học', 5000000, '- Thực hiện nghiệp vụ tin học tại Chi nhánh, đảm bảo đáp ứng một cách nhanh chóng, kịp thời phục vụ cho hoạt động của các phòng/ban tại Chi nhánh.<br/> \r\n- Phát triển, nâng cấp ứng dụng phục vụ cho hoạt động thống kê báo cáo của Chi nhánh.', 'Căn cứ vào mức độ thuận lợi trong việc thu hút ứng viên, VCB phân loại Chi nhánh theo Nhóm như sau:<br/> \r\n- Nhóm 1: Yêu cầu ứng viên tốt nghiệp loại Khá trở lên, hệ chính quy chuyên ngành phù hợp với vị trí tuyển dụng tại các trường Đại học công lập, bao gồm: Học viện Tài chính, Đại học Kinh tế Quốc dân; Đại học Ngoại thương (TP. Hà Nội và TP. Hồ Chi Minh); Học viện Ngân hàng; Đại học Kinh tế - thuộc Đại học Quốc gia TP. Hà Nội; Đại học Kinh tế TP. Hồ Chí Minh; Đại học Ngân hàng TP. Hồ Chí Minh; Đại học Đà Nẵng; Đại học Kinh tế - thuộc Đại học Huế; Đại học Kinh tế - Luật – thuộc Đại học Quốc gia TP. Hồ Chí Minh và các trường Đại học Việt Nam liên kết với các trường Đại học nước ngoài/các trường Đại học nước ngoài tại Việt Nam/các Trường Đại học nước ngoài có uy tín và trường Đại học ngoài công lập: Đại học RMIT (TP. Hà Nội và TP. Hồ Chí Minh).', '2019-04-01', '2019-04-25', 5, 'Ha Noi', 1),
(11, 2, 11, 'tuetinhmars@gmail.com', 'Cán Bộ Kế Toán/gdv', 2000000, '- Tiếp đón, tìm hiểu nhu cầu của khách hàng, trực tiếp xử lý, thực hiện các giao dịch; tiếp cận, giới thiệu và bán sản phẩm dịch vụ ngân hàng;<br/> \r\n- Giải đáp thắc mắc của khách hàng; thực hiện chương trình chăm sóc khách hàng của ngân hàng.<br/> \r\n- Thực hiện các giao dịch chuyển tiền, thu chi tiền mặt, tính và thu phí dịch vụ, thu lãi vay, thu đổi ngoại tệ, thu đổi công trái, thu đổi tiền không đủ tiêu chuẩn lưu thông, thu nợ, giải ngân, thực hiện dịch vụ nhận và chuyển ủy nhiệm thu cho các đối tác; hậu kiểm các chứng từ liên quan tới các giao dịch.', 'Căn cứ vào mức độ thuận lợi trong việc thu hút ứng viên, VCB phân loại Chi nhánh theo Nhóm như sau:<br/> \r\n- Nhóm 1: Yêu cầu ứng viên tốt nghiệp loại Khá trở lên, hệ chính quy chuyên ngành phù hợp với vị trí tuyển dụng tại các trường Đại học công lập, bao gồm: Học viện Tài chính, Đại học Kinh tế Quốc dân; Đại học Ngoại thương (TP. Hà Nội và TP. Hồ Chi Minh); Học viện Ngân hàng; Đại học Kinh tế - thuộc Đại học Quốc gia TP. Hà Nội; Đại học Kinh tế TP. Hồ Chí Minh; Đại học Ngân hàng TP. Hồ Chí Minh; Đại học Đà Nẵng; Đại học Kinh tế - thuộc Đại học Huế; Đại học Kinh tế - Luật – thuộc Đại học Quốc gia TP. Hồ Chí Minh và các trường Đại học Việt Nam liên kết với các trường Đại học nước ngoài/các trường Đại học nước ngoài tại Việt Nam/các Trường Đại học nước ngoài có uy tín và trường Đại học ngoài công lập: Đại học RMIT (TP. Hà Nội và TP. Hồ Chí Minh).', '2019-04-01', '2019-04-25', 5, 'Ha Noi', 1),
(15, 2, 2, 'bestmonster1', 'Kỹ Sư Phần Mềm Hệ Thống/web', 20000000, '* Phân tích, thiết kế, đề xuất giải pháp cho phần mềm<br/> \r\n* Nguyên cứu, đề xuất giải pháp, xây dựng và triển khai hệ thống<br/> \r\n* Thiết kế, hiện thực, tối ưu hệ thống cơ sở dữ liệu, hệ thống API; Hệ thống/protocol giao tiếp với thiết bị; Web service giao tiếp client-server, hệ thống WEB giao tiếp người dùng, quản trị.<br/> \r\n* Thiết kế lập trình web trên nhiều thiết bị như máy tính, điện thoại, tablet.<br/> \r\n* Xây dựng bài đo, phương pháp đo, thực hiện kiểm thử đánh giá phần mềm', '* Có kiến thức nền tảng chuyên nghành Khoa học máy tính; Công nghệ thông tin; Điện tử viễn thông…<br/> \r\n* Có kiến thức về mạng máy tính; Bảo mật<br/> \r\n* Nắm vững các kiến thức cơ bản của phần mềm như Cấu trúc dữ liệu giải thuật; Phân tích thiết kế giải thuật; Ngôn ngữ lập trình; Hệ điều hành; Cơ sở dữ liệu; Mẫu thiết kế design pattern, lập trình OOP<br/> \r\n* Có kiến thức chuyên sâu về cơ sở dữ liệu có và không có quan hệ (SQL và NoSQL)<br/> \r\n* Có kinh nghiệm phát triển Web Services, thành thạo ngôn ngữ lập trình như Java; Javascript; HTML; AJAX, CSS .., thành thạo các định dạng dữ liệu XML, JSON, BSON, SIP, RTP ..', '2019-04-22', '2019-05-27', 20, 'Ha Noi', 0),
(17, 1, 1, 'bestmonster1', 'Tuyển thưc tập viên', 2678, 'aaa', 'sssđ', '2019-05-04', '2019-05-24', 0, 'Ha Noi', 0),
(19, 2, 6, 'bestmonster1', 'TUyển trưởng phòng marketing', 9000, '-Mô tả công việc', '-Yêu  cầu abc', '2019-05-09', '2019-05-17', 0, 'Ho Chi Minh', 0),
(20, 3, 14, 'tuetinhmars@gmail.com', 'Tuyển trưởng bộ phận nhân sự', 3000, '- Vị trí trưởng phòng nhân sự\r\n- Đảm nhiệm nhiệm vụ tuyển nhân sự cho công ti', '-Yêu cầu có tinh thần trách nhiệm cao\r\n-Làm việc hiệu quả', '2019-05-09', '2019-06-28', 0, 'Ho Chi Minh', 0),
(21, 3, 2, 'tuetinhmars@gmail.com', 'Tuyển lập trình viên', 2730, '-test', 'test', '2019-05-10', '2019-05-31', 0, 'Ho Chi Minh', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(1, 'Ha Noi'),
(2, 'Ho Chi Minh'),
(3, 'Thai Binh'),
(4, 'Phu Tho');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mail`
--

CREATE TABLE `mail` (
  `ID` int(11) NOT NULL,
  `From_user` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `To_user` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `subject` text CHARACTER SET utf8mb4 NOT NULL,
  `mail` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `mail`
--

INSERT INTO `mail` (`ID`, `From_user`, `To_user`, `subject`, `mail`) VALUES
(1, 'bestmonster1', 'Bestmonster', 'Kính gửi', 'Dear\r\nahshs'),
(2, 'bestmonster1', 'Bestmonster', 'Kính gửi', 'Xin chaof'),
(6, 'bestmonster', 'bestmonster1', 'abc', 'abc'),
(14, 'bestmonster', 'Bestmonster1', 'âssasa', 'Dear sir alex'),
(15, 'bestmonster1', 'Bestmonster2', 'Xin chào', 'abcdesssss'),
(16, 'bestmonster1', 'Bestmonster', 'Dear', '-Xin chào bạn\r\nTôi đến từ công ti abc.Sau khi xem xét thông tin của bạn. Mời bạn đến địa chỉ xyz để phỏng vấn thời gian mnp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `skill`
--

CREATE TABLE `skill` (
  `username` varchar(50) NOT NULL,
  `skill` text NOT NULL,
  `experience` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `skill`
--

INSERT INTO `skill` (`username`, `skill`, `experience`) VALUES
('bestmonster', 'ausadhdsaoadsoids', 'áhahsadihsda');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeofjob`
--

CREATE TABLE `typeofjob` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf32_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `typeofjob`
--

INSERT INTO `typeofjob` (`Id`, `Name`) VALUES
(1, 'Thiết kế đồ họa'),
(2, 'Kĩ sư phần mềm'),
(3, 'Giáo dục & Đào tạo'),
(4, 'Các ngành ngôn ngữ'),
(5, 'Nhà báo'),
(6, 'Sales/ Marketing'),
(7, 'Nhân viên phục vụ'),
(8, 'Kĩ sư xây dựng'),
(9, 'Điện/ Điện tử'),
(10, 'Kĩ sư hệ thống thông tin'),
(11, 'AI/ Khoa học dữ liệu'),
(12, 'Quản lí khách sạn'),
(13, 'Kiến trúc sư'),
(14, 'Nhân sự/ Quản lý dự án'),
(15, 'Y tế/ Dược phẩm'),
(16, 'Các nhóm ngành khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(64) COLLATE utf32_vietnamese_ci NOT NULL,
  `name` varchar(255) COLLATE utf32_vietnamese_ci NOT NULL,
  `gender` varchar(10) COLLATE utf32_vietnamese_ci NOT NULL,
  `DOB` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `type` int(2) NOT NULL,
  `mail` varchar(255) COLLATE utf32_vietnamese_ci NOT NULL,
  `money` int(11) NOT NULL,
  `phone` varchar(11) COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `website` varchar(50) COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `company` varchar(50) COLLATE utf32_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `gender`, `DOB`, `address`, `type`, `mail`, `money`, `phone`, `website`, `company`) VALUES
('bestmonster', '123456', 'Nguyễn Bá Việt', 'male', '1998-04-02', 'Thái Bình', 2, 'nbviet98@gmail.com', 0, NULL, '', ''),
('bestmonster1', '123456', 'Nguyễn Bá Việt', 'male', '1998-03-06', 'Thái Bình', 1, 'nguyenbaviet98@gmail.com', 0, '0123456789', 'asshole@mdkak', 'TNHHabc'),
('bestmonster2', '123456', 'Nguyễn Bá Nam', 'male', '2019-04-11', 'Thái Bình', 2, 'nbviet@gmail.com', 0, '01625347711', 'bestmonster.com', ''),
('bestmonster5', '123456', 'Nguyễn Bá Nam', 'male', '2019-04-03', 'Thái Bình', 2, 'nbviet1998@gmail.com', 0, '01625347711', 'bestmonster.com', ''),
('nguyenbanam', '123456', 'Nguyễn Bá Nam', 'male', '1993-08-07', 'Thái Bình', 2, 'nbnam93@gmail.com', 0, '0123456789', 'bestmonster.com', ''),
('tuetinhmars@gmail.com', '123456', 'tuephamduc', 'female', NULL, NULL, 1, 'tue@gmail.com', 0, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`idJob`,`username`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `idType` (`idType`,`idUser`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`),
  ADD KEY `idUser_3` (`idUser`);

--
-- Chỉ mục cho bảng `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `typeofjob`
--
ALTER TABLE `typeofjob`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `job`
--
ALTER TABLE `job`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `mail`
--
ALTER TABLE `mail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `typeofjob`
--
ALTER TABLE `typeofjob`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `job_ibfk_4` FOREIGN KEY (`idJob`) REFERENCES `job` (`Id`);

--
-- Các ràng buộc cho bảng `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `typeofjob` (`Id`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `category` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
