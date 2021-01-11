Software License Agreement
==========================


HTML Editor	Artifact [4879138647]	Not logged in
HomeTimelineFilesBranchesTagsTicketsWikiLogin
Check-ins Using Download Hex Line Numbers
Artifact 48791386474d85490398af3eeb2f4ab7b6bb1cfd:
File Out/Win32/Debug/ckeditor/_source/lang/vi.js — part of check-in [c394f978d4] at 2012-02-16 08:48:33 on branch trunk — Initial check-in. Program works: loading HTML, saving HTML. No support for adding local images, or any other auxiliary files. (user: MCo, size: 27737) [annotate] [blame] [check-ins using]
File Out/Win64/Debug/ckeditor/_source/lang/vi.js — part of check-in [c81c1af325] at 2012-02-16 21:04:47 on branch trunk — Added Win64 platform. (user: Martijn, size: 27737) [annotate] [blame] [check-ins using]
/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @fileOverview Defines the {@link CKEDITOR.lang} object, for the
 * Vietnamese language.
 */

/**#@+
   @type String
   @example
*/

/**
 * Contains the dictionary of language entries.
 * @namespace
 */
CKEDITOR.lang['vi'] =
{
	/**
	 * The language reading direction. Possible values are "rtl" for
	 * Right-To-Left languages (like Arabic) and "ltr" for Left-To-Right
	 * languages (like English).
	 * @default 'ltr'
	 */
	dir : 'ltr',

	/*
	 * Screenreader titles. Please note that screenreaders are not always capable
	 * of reading non-English words. So be careful while translating it.
	 */
	editorTitle : 'Bộ soạn thảo, %1, nhấn ALT + 0 để xem hướng dẫn.',

	// ARIA descriptions.
	toolbars	: 'Editor toolbars', // MISSING
	editor		: 'Bộ soạn thảo',

	// Toolbar buttons without dialogs.
	source			: 'Mã HTML',
	newPage			: 'Trang mới',
	save			: 'Lưu',
	preview			: 'Xem trước',
	cut				: 'Cắt',
	copy			: 'Sao chép',
	paste			: 'Dán',
	print			: 'In',
	underline		: 'Gạch chân',
	bold			: 'Đậm',
	italic			: 'Nghiêng',
	selectAll		: 'Chọn tất cả',
	removeFormat	: 'Xoá định dạng',
	strike			: 'Gạch xuyên ngang',
	subscript		: 'Chỉ số dưới',
	superscript		: 'Chỉ số trên',
	horizontalrule	: 'Chèn đường phân cách ngang',
	pagebreak		: 'Chèn ngắt trang',
	pagebreakAlt		: 'Page Break', // MISSING
	unlink			: 'Xoá liên kết',
	undo			: 'Khôi phục thao tác',
	redo			: 'Làm lại thao tác',

	// Common messages and labels.
	common :
	{
		browseServer	: 'Duyệt trên máy chủ',
		url				: 'URL',
		protocol		: 'Giao thức',
		upload			: 'Tải lên',
		uploadSubmit	: 'Tải lên máy chủ',
		image			: 'Hình ảnh',
		flash			: 'Flash',
		form			: 'Biểu mẫu',
		checkbox		: 'Nút kiểm',
		radio			: 'Nút chọn',
		textField		: 'Trường văn bản',
		textarea		: 'Vùng văn bản',
		hiddenField		: 'Trường ẩn',
		button			: 'Nút',
		select			: 'Ô chọn',
		imageButton		: 'Nút hình ảnh',
		notSet			: '<không thiết lập>',
		id				: 'Định danh',
		name			: 'Tên',
		langDir			: 'Hướng ngôn ngữ',
		langDirLtr		: 'Trái sang phải (LTR)',
		langDirRtl		: 'Phải sang trái (RTL)',
		langCode		: 'Mã ngôn ngữ',
		longDescr		: 'Mô tả URL',
		cssClass		: 'Lớp Stylesheet',
		advisoryTitle	: 'Nhan đề hướng dẫn',
		cssStyle		: 'Kiểu (style)',
		ok				: 'Đồng ý',
		cancel			: 'Bỏ qua',
		close			: 'Đóng',
		preview			: 'Xem trước',
		generalTab		: 'Tab chung',
		advancedTab		: 'Tab mở rộng',
		validateNumberFailed : 'Giá trị này không phải là số.',
		confirmNewPage	: 'Mọi thay đổi không được lưu lại, nội dung này sẽ bị mất. Bạn có chắc chắn muốn tải một trang mới?',
		confirmCancel	: 'Một vài tùy chọn đã bị thay đổi. Bạn có chắc chắn muốn đóng hộp thoại?',
		options			: 'Tùy chọn',
		target			: 'Đích đến',
		targetNew		: 'Cửa sổ mới (_blank)',
		targetTop		: 'Cửa sổ trên cùng (_top)',
		targetSelf		: 'Tại trang (_self)',
		targetParent	: 'Cửa sổ cha (_parent)',
		langDirLTR		: 'Left to Right (LTR)', // MISSING
		langDirRTL		: 'Right to Left (RTL)', // MISSING
		styles			: 'Style', // MISSING
		cssClasses		: 'Stylesheet Classes', // MISSING
		width			: 'Chiều rộng',
		height			: 'chiều cao',
		align			: 'Vị trí',
		alignLeft		: 'Trái',
		alignRight		: 'Phải',
		alignCenter		: 'Giữa',
		alignTop		: 'Trên',
		alignMiddle		: 'Giữa',
		alignBottom		: 'Dưới',
		invalidHeight	: 'Chiều cao phải là số nguyên.',
		invalidWidth	: 'Chiều rộng phải là số nguyên.',
		invalidCssLength	: 'Value specified for the "%1" field must be a positive number with or without a valid CSS measurement unit (px, %, in, cm, mm, em, ex, pt, or pc).', // MISSING
		invalidHtmlLength	: 'Value specified for the "%1" field must be a positive number with or without a valid HTML measurement unit (px or %).', // MISSING
		invalidInlineStyle	: 'Value specified for the inline style must consist of one or more tuples with the format of "name : value", separated by semi-colons.', // MISSING
		cssLengthTooltip	: 'Enter a number for a value in pixels or a number with a valid CSS unit (px, %, in, cm, mm, em, ex, pt, or pc).', // MISSING

		// Put the voice-only part of the label in the span.
		unavailable		: '%1<span class="cke_accessibility">, không có</span>'
	},

	contextmenu :
	{
		options : 'Tùy chọn menu bổ xung'
	},

	// Special char dialog.
	specialChar		:
	{
		toolbar		: 'Chèn ký tự đặc biệt',
		title		: 'Hãy chọn ký tự đặc biệt',
		options : 'Tùy chọn các ký tự đặc biệt'
	},

	// Link dialog.
	link :
	{
		toolbar		: 'Chèn/Sửa liên kết',
		other 		: '<khác>',
		menu		: 'Sửa liên kết',
		title		: 'Liên kết',
		info		: 'Thông tin liên kết',
		target		: 'Đích',
		upload		: 'Tải lên',
		advanced	: 'Mở rộng',
		type		: 'Kiểu liên kết',
		toUrl		: 'URL',
		toAnchor	: 'Neo trong trang này',
		toEmail		: 'Thư điện tử',
		targetFrame		: '<khung>',
		targetPopup		: '<cửa sổ popup>',
		targetFrameName	: 'Tên khung đích',
		targetPopupName	: 'Tên cửa sổ Popup',
		popupFeatures	: 'Đặc điểm của cửa sổ Popup',
		popupResizable	: 'Có thể thay đổi kích cỡ',
		popupStatusBar	: 'Thanh trạng thái',
		popupLocationBar: 'Thanh vị trí',
		popupToolbar	: 'Thanh công cụ',
		popupMenuBar	: 'Thanh Menu',
		popupFullScreen	: 'Toàn màn hình (IE)',
		popupScrollBars	: 'Thanh cuộn',
		popupDependent	: 'Phụ thuộc (Netscape)',
		popupLeft		: 'Vị trí bên trái',
		popupTop		: 'Vị trí phía trên',
		id				: 'Định danh',
		langDir			: 'Hướng ngôn ngữ',
		langDirLTR		: 'Trái sang phải (LTR)',
		langDirRTL		: 'Phải sang trái (RTL)',
		acccessKey		: 'Phím hỗ trợ truy cập',
		name			: 'Tên',
		langCode			: 'Mã ngôn ngữ',
		tabIndex			: 'Chỉ số của Tab',
		advisoryTitle		: 'Nhan đề hướng dẫn',
		advisoryContentType	: 'Nội dung hướng dẫn',
		cssClasses		: 'Lớp Stylesheet',
		charset			: 'Bảng mã của tài nguyên được liên kết đến',
		styles			: 'Kiểu (style)',
		rel			: 'Relationship', // MISSING
		selectAnchor		: 'Chọn một điểm neo',
		anchorName		: 'Theo tên điểm neo',
		anchorId			: 'Theo định danh thành phần',
		emailAddress		: 'Thư điện tử',
		emailSubject		: 'Tiêu đề thông điệp',
		emailBody		: 'Nội dung thông điệp',
		noAnchors		: '(Không có điểm neo nào trong tài liệu)',
		noUrl			: 'Hãy đưa vào đường dẫn liên kết (URL)',
		noEmail			: 'Hãy đưa vào địa chỉ thư điện tử'
	},

	// Anchor dialog
	anchor :
	{
		toolbar		: 'Chèn/Sửa điểm neo',
		menu		: 'Thuộc tính điểm neo',
		title		: 'Thuộc tính điểm neo',
		name		: 'Tên của điểm neo',
		errorName	: 'Hãy nhập vào tên của điểm neo',
		remove		: 'Remove Anchor' // MISSING
	},

	// List style dialog
	list:
	{
		numberedTitle		: 'Thuộc tính danh sách có thứ tự',
		bulletedTitle		: 'Thuộc tính danh sách không thứ tự',
		type				: 'Kiểu loại',
		start				: 'Bắt đầu',
		validateStartNumber				:'List start number must be a whole number.', // MISSING
		circle				: 'Khuyên tròn',
		disc				: 'Hình đĩa',
		square				: 'Hình vuông',
		none				: 'Không gì cả',
		notset				: '<không thiết lập>',
		armenian			: 'Số theo kiểu Armenian',
		georgian			: 'Số theo kiểu Georgian (an, ban, gan...)',
		lowerRoman			: 'Số La Mã kiểu thường (i, ii, iii, iv, v...)',
		upperRoman			: 'Số La Mã kiểu HOA (I, II, III, IV, V...)',
		lowerAlpha			: 'Kiểu abc thường (a, b, c, d, e...)',
		upperAlpha			: 'Kiểu ABC HOA (A, B, C, D, E...)',
		lowerGreek			: 'Kiểu Hy Lạp (alpha, beta, gamma...)',
		decimal				: 'Kiểu số (1, 2, 3 ...)',
		decimalLeadingZero	: 'Kiểu số (01, 02, 03...)'
	},

	// Find And Replace Dialog
	findAndReplace :
	{
		title				: 'Tìm kiếm và thay thế',
		find				: 'Tìm kiếm',
		replace				: 'Thay thế',
		findWhat			: 'Tìm chuỗi:',
		replaceWith			: 'Thay bằng:',
		notFoundMsg			: 'Không tìm thấy chuỗi cần tìm.',
		findOptions			: 'Find Options', // MISSING
		matchCase			: 'Phân biệt chữ hoa/thường',
		matchWord			: 'Giống toàn bộ từ',
		matchCyclic			: 'Giống một phần',
		replaceAll			: 'Thay thế tất cả',
		replaceSuccessMsg	: '%1 vị trí đã được thay thế.'
	},

	// Table Dialog
	table :
	{
		toolbar		: 'Bảng',
		title		: 'Thuộc tính bảng',
		menu		: 'Thuộc tính bảng',
		deleteTable	: 'Xóa bảng',
		rows		: 'Số hàng',
		columns		: 'Số cột',
		border		: 'Kích thước đường viền',
		widthPx		: 'Điểm ảnh (px)',
		widthPc		: 'Phần trăm (%)',
		widthUnit	: 'Đơn vị',
		cellSpace	: 'Khoảng cách giữa các ô',
		cellPad		: 'Khoảng đệm giữ ô và nội dung',
		caption		: 'Đầu đề',
		summary		: 'Tóm lược',
		headers		: 'Đầu đề',
		headersNone		: 'Không có',
		headersColumn	: 'Cột đầu tiên',
		headersRow		: 'Hàng đầu tiên',
		headersBoth		: 'Cả hai',
		invalidRows		: 'Số lượng hàng phải là một số lớn hơn 0.',
		invalidCols		: 'Số lượng cột phải là một số lớn hơn 0.',
		invalidBorder	: 'Kích cỡ của đường biên phải là một số nguyên.',
		invalidWidth	: 'Chiều rộng của bảng phải là một số nguyên.',
		invalidHeight	: 'Chiều cao của bảng phải là một số nguyên.',
		invalidCellSpacing	: 'Khoảng cách giữa các ô phải là một số nguyên.',
		invalidCellPadding	: 'Khoảng đệm giữa ô và nội dung phải là một số nguyên.',

		cell :
		{
			menu			: 'Ô',
			insertBefore	: 'Chèn ô Phía trước',
			insertAfter		: 'Chèn ô Phía sau',
			deleteCell		: 'Xoá ô',
			merge			: 'Kết hợp ô',
			mergeRight		: 'Kết hợp sang phải',
			mergeDown		: 'Kết hợp xuống dưới',
			splitHorizontal	: 'Phân tách ô theo chiều ngang',
			splitVertical	: 'Phân tách ô theo chiều dọc',
			title			: 'Thuộc tính của ô',
			cellType		: 'Kiểu của ô',
			rowSpan			: 'Kết hợp hàng',
			colSpan			: 'Kết hợp cột',
			wordWrap		: 'Chữ liền hàng',
			hAlign			: 'Canh lề ngang',
			vAlign			: 'Canh lề dọc',
			alignBaseline	: 'Đường cơ sở',
			bgColor			: 'Màu nền',
			borderColor		: 'Màu viền',
			data			: 'Dữ liệu',
			header			: 'Đầu đề',
			yes				: 'Có',
			no				: 'Không',
			invalidWidth	: 'Chiều rộng của ô phải là một số nguyên.',
			invalidHeight	: 'Chiều cao của ô phải là một số nguyên.',
			invalidRowSpan	: 'Số hàng kết hợp phải là một số nguyên.',
			invalidColSpan	: 'Số cột kết hợp phải là một số nguyên.',
			chooseColor		: 'Chọn màu'
		},

		row :
		{
			menu			: 'Hàng',
			insertBefore	: 'Chèn hàng phía trước',
			insertAfter		: 'Chèn hàng phía sau',
			deleteRow		: 'Xoá hàng'
		},

		column :
		{
			menu			: 'Cột',
			insertBefore	: 'Chèn cột phía trước',
			insertAfter		: 'Chèn cột phía sau',
			deleteColumn	: 'Xoá cột'
		}
	},

	// Button Dialog.
	button :
	{
		title		: 'Thuộc tính của nút',
		text		: 'Chuỗi hiển thị (giá trị)',
		type		: 'Kiểu',
		typeBtn		: 'Nút bấm',
		typeSbm		: 'Nút gửi',
		typeRst		: 'Nút nhập lại'
	},

	// Checkbox and Radio Button Dialogs.
	checkboxAndRadio :
	{
		checkboxTitle : 'Thuộc tính nút kiểm',
		radioTitle	: 'Thuộc tính nút chọn',
		value		: 'Giá trị',
		selected	: 'Được chọn'
	},

	// Form Dialog.
	form :
	{
		title		: 'Thuộc tính biểu mẫu',
		menu		: 'Thuộc tính biểu mẫu',
		action		: 'Hành động',
		method		: 'Phương thức',
		encoding	: 'Bảng mã'
	},

	// Select Field Dialog.
	select :
	{
		title		: 'Thuộc tính ô chọn',
		selectInfo	: 'Thông tin',
		opAvail		: 'Các tùy chọn có thể sử dụng',
		value		: 'Giá trị',
		size		: 'Kích cỡ',
		lines		: 'dòng',
		chkMulti	: 'Cho phép chọn nhiều',
		opText		: 'Văn bản',
		opValue		: 'Giá trị',
		btnAdd		: 'Thêm',
		btnModify	: 'Thay đổi',
		btnUp		: 'Lên',
		btnDown		: 'Xuống',
		btnSetValue : 'Giá trị được chọn',
		btnDelete	: 'Nút xoá'
	},

	// Textarea Dialog.
	textarea :
	{
		title		: 'Thuộc tính vùng văn bản',
		cols		: 'Số cột',
		rows		: 'Số hàng'
	},

	// Text Field Dialog.
	textfield :
	{
		title		: 'Thuộc tính trường văn bản',
		name		: 'Tên',
		value		: 'Giá trị',
		charWidth	: 'Độ rộng của ký tự',
		maxChars	: 'Số ký tự tối đa',
		type		: 'Kiểu',
		typeText	: 'Ký tự',
		typePass	: 'Mật khẩu'
	},

	// Hidden Field Dialog.
	hidden :
	{
		title	: 'Thuộc tính trường ẩn',
		name	: 'Tên',
		value	: 'Giá trị'
	},

	// Image Dialog.
	image :
	{
		title		: 'Thuộc tính của ảnh',
		titleButton	: 'Thuộc tính nút của ảnh',
		menu		: 'Thuộc tính của ảnh',
		infoTab		: 'Thông tin của ảnh',
		btnUpload	: 'Tải lên máy chủ',
		upload		: 'Tải lên',
		alt			: 'Chú thích ảnh',
		lockRatio	: 'Giữ nguyên tỷ lệ',
		resetSize	: 'Kích thước gốc',
		border		: 'Đường viền',
		hSpace		: 'Khoảng đệm ngang',
		vSpace		: 'Khoảng đệm dọc',
		alertUrl	: 'Hãy đưa vào đường dẫn của ảnh',
		linkTab		: 'Tab liên kết',
		button2Img	: 'Bạn có muốn chuyển nút bấm bằng ảnh được chọn thành ảnh?',
		img2Button	: 'Bạn có muốn chuyển đổi ảnh được chọn thành nút bấm bằng ảnh?',
		urlMissing	: 'Thiếu đường dẫn hình ảnh',
		validateBorder	: 'Chiều rộng của đường viền phải là một số nguyên dương',
		validateHSpace	: 'Khoảng đệm ngang phải là một số nguyên dương',
		validateVSpace	: 'Khoảng đệm dọc phải là một số nguyên dương'
	},

	// Flash Dialog
	flash :
	{
		properties		: 'Thuộc tính Flash',
		propertiesTab	: 'Thuộc tính',
		title			: 'Thuộc tính Flash',
		chkPlay			: 'Tự động chạy',
		chkLoop			: 'Lặp',
		chkMenu			: 'Cho phép bật menu của Flash',
		chkFull			: 'Cho phép toàn màn hình',
 		scale			: 'Tỷ lệ',
		scaleAll		: 'Hiển thị tất cả',
		scaleNoBorder	: 'Không đường viền',
		scaleFit		: 'Vừa vặn',
		access			: 'Truy cập mã',
		accessAlways	: 'Luôn luôn',
		accessSameDomain: 'Cùng tên miền',
		accessNever		: 'Không bao giờ',
		alignAbsBottom	: 'Dưới tuyệt đối',
		alignAbsMiddle	: 'Giữa tuyệt đối',
		alignBaseline	: 'Đường cơ sở',
		alignTextTop	: 'Phía trên chữ',
		quality			: 'Chất lượng',
		qualityBest		: 'Tốt nhất',
		qualityHigh		: 'Cao',
		qualityAutoHigh	: 'Cao tự động',
		qualityMedium	: 'Trung bình',
		qualityAutoLow	: 'Thấp tự động',
		qualityLow		: 'Thấp',
		windowModeWindow: 'Cửa sổ',
		windowModeOpaque: 'Mờ đục',
		windowModeTransparent : 'Trong suốt',
		windowMode		: 'Chế độ cửa sổ',
		flashvars		: 'Các biến số dành cho Flash',
		bgcolor			: 'Màu nền',
		hSpace			: 'Khoảng đệm ngang',
		vSpace			: 'Khoảng đệm dọc',
		validateSrc		: 'Hãy đưa vào đường dẫn liên kết',
		validateHSpace	: 'Khoảng đệm ngang phải là số nguyên.',
		validateVSpace	: 'Khoảng đệm dọc phải là số nguyên.'
	},

	// Speller Pages Dialog
	spellCheck :
	{
		toolbar			: 'Kiểm tra chính tả',
		title			: 'Kiểm tra chính tả',
		notAvailable	: 'Xin lỗi, dịch vụ này hiện tại không có.',
		errorLoading	: 'Lỗi khi đang nạp dịch vụ ứng dụng: %s.',
		notInDic		: 'Không có trong từ điển',
		changeTo		: 'Chuyển thành',
		btnIgnore		: 'Bỏ qua',
		btnIgnoreAll	: 'Bỏ qua tất cả',
		btnReplace		: 'Thay thế',
		btnReplaceAll	: 'Thay thế tất cả',
		btnUndo			: 'Phục hồi lại',
		noSuggestions	: '- Không đưa ra gợi ý về từ -',
		progress		: 'Đang tiến hành kiểm tra chính tả...',
		noMispell		: 'Hoàn tất kiểm tra chính tả: Không có lỗi chính tả',
		noChanges		: 'Hoàn tất kiểm tra chính tả: Không có từ nào được thay đổi',
		oneChange		: 'Hoàn tất kiểm tra chính tả: Một từ đã được thay đổi',
		manyChanges		: 'Hoàn tất kiểm tra chính tả: %1 từ đã được thay đổi',
		ieSpellDownload	: 'Chức năng kiểm tra chính tả chưa được cài đặt. Bạn có muốn tải về ngay bây giờ?'
	},

	smiley :
	{
		toolbar	: 'Hình biểu lộ cảm xúc (mặt cười)',
		title	: 'Chèn hình biểu lộ cảm xúc (mặt cười)',
		options : 'Tùy chọn hình  biểu lộ cảm xúc'
	},

	elementsPath :
	{
		eleLabel : 'Nhãn thành phần',
		eleTitle : '%1 thành phần'
	},

	numberedlist	: 'Danh sách có thứ tự',
	bulletedlist	: 'Danh sách không thứ tự',
	indent			: 'Dịch vào trong',
	outdent			: 'Dịch ra ngoài',

	justify :
	{
		left	: 'Canh trái',
		center	: 'Canh giữa',
		right	: 'Canh phải',
		block	: 'Canh đều'
	},

	blockquote : 'Khối trích dẫn',

	clipboard :
	{
		title		: 'Dán',
		cutError	: 'Các thiết lập bảo mật của trình duyệt không cho phép trình biên tập tự động thực thi lệnh cắt. Hãy sử dụng bàn phím cho lệnh này (Ctrl/Cmd+X).',
		copyError	: 'Các thiết lập bảo mật của trình duyệt không cho phép trình biên tập tự động thực thi lệnh sao chép. Hãy sử dụng bàn phím cho lệnh này (Ctrl/Cmd+C).',
		pasteMsg	: 'Hãy dán nội dung vào trong khung bên dưới, sử dụng tổ hợp phím (<STRONG>Ctrl/Cmd+V</STRONG>) và nhấn vào nút <STRONG>Đồng ý</STRONG>.',
		securityMsg	: 'Do thiết lập bảo mật của trình duyệt nên trình biên tập không thể truy cập trực tiếp vào nội dung đã sao chép. Bạn cần phải dán lại nội dung vào cửa sổ này.',
		pasteArea	: 'Khu vực dán'
	},

	pastefromword :
	{
		confirmCleanup	: 'Văn bản bạn muốn dán có kèm định dạng của Word. Bạn có muốn loại bỏ định dạng Word trước khi dán?',
		toolbar			: 'Dán với định dạng Word',
		title			: 'Dán với định dạng Word',
		error			: 'It was not possible to clean up the pasted data due to an internal error' // MISSING
	},

	pasteText :
	{
		button	: 'Dán theo định dạng văn bản thuần',
		title	: 'Dán theo định dạng văn bản thuần'
	},

	templates :
	{
		button			: 'Mẫu dựng sẵn',
		title			: 'Nội dung Mẫu dựng sẵn',
		options : 'Tùy chọn mẫu dựng sẵn',
		insertOption	: 'Thay thế nội dung hiện tại',
		selectPromptMsg	: 'Hãy chọn mẫu dựng sẵn để mở trong trình biên tập<br>(nội dung hiện tại sẽ bị mất):',
		emptyListMsg	: '(Không có mẫu dựng sẵn nào được định nghĩa)'
	},

	showBlocks : 'Hiển thị các khối',

	stylesCombo :
	{
		label		: 'Kiểu',
		panelTitle	: 'Phong cách định dạng',
		panelTitle1	: 'Kiểu khối',
		panelTitle2	: 'Kiểu trực tiếp',
		panelTitle3	: 'Kiểu đối tượng'
	},

	format :
	{
		label		: 'Định dạng',
		panelTitle	: 'Định dạng',

		tag_p		: 'Bình thường (P)',
		tag_pre		: 'Đã thiết lập',
		tag_address	: 'Address',
		tag_h1		: 'Heading 1',
		tag_h2		: 'Heading 2',
		tag_h3		: 'Heading 3',
		tag_h4		: 'Heading 4',
		tag_h5		: 'Heading 5',
		tag_h6		: 'Heading 6',
		tag_div		: 'Bình thường (DIV)'
	},

	div :
	{
		title				: 'Tạo khối các thành phần',
		toolbar				: 'Tạo khối các thành phần',
		cssClassInputLabel	: 'Các lớp CSS',
		styleSelectLabel	: 'Kiểu (style)',
		IdInputLabel		: 'Định danh (id)',
		languageCodeInputLabel	: 'Mã ngôn ngữ',
		inlineStyleInputLabel	: 'Kiểu nội dòng',
		advisoryTitleInputLabel	: 'Nhan đề hướng dẫn',
		langDirLabel		: 'Hướng ngôn ngữ',
		langDirLTRLabel		: 'Trái sang phải (LTR)',
		langDirRTLLabel		: 'Phải qua trái (RTL)',
		edit				: 'Chỉnh sửa',
		remove				: 'Xóa bỏ'
  	},

	iframe :
	{
		title		: 'IFrame Properties', // MISSING
		toolbar		: 'IFrame', // MISSING
		noUrl		: 'Please type the iframe URL', // MISSING
		scrolling	: 'Enable scrollbars', // MISSING
		border		: 'Show frame border' // MISSING
	},

	font :
	{
		label		: 'Phông',
		voiceLabel	: 'Phông',
		panelTitle	: 'Phông'
	},

	fontSize :
	{
		label		: 'Cỡ chữ',
		voiceLabel	: 'Kích cỡ phông',
		panelTitle	: 'Cỡ chữ'
	},

	colorButton :
	{
		textColorTitle	: 'Màu chữ',
		bgColorTitle	: 'Màu nền',
		panelTitle		: 'Màu sắc',
		auto			: 'Tự động',
		more			: 'Màu khác...'
	},

	colors :
	{
		'000' : 'Black', // MISSING
		'800000' : 'Maroon', // MISSING
		'8B4513' : 'Saddle Brown', // MISSING
		'2F4F4F' : 'Dark Slate Gray', // MISSING
		'008080' : 'Teal', // MISSING
		'000080' : 'Navy', // MISSING
		'4B0082' : 'Indigo', // MISSING
		'696969' : 'Dark Gray', // MISSING
		'B22222' : 'Fire Brick', // MISSING
		'A52A2A' : 'Brown', // MISSING
		'DAA520' : 'Golden Rod', // MISSING
		'006400' : 'Dark Green', // MISSING
		'40E0D0' : 'Turquoise', // MISSING
		'0000CD' : 'Medium Blue', // MISSING
		'800080' : 'Purple', // MISSING
		'808080' : 'Gray', // MISSING
		'F00' : 'Red', // MISSING
		'FF8C00' : 'Dark Orange', // MISSING
		'FFD700' : 'Gold', // MISSING
		'008000' : 'Green', // MISSING
		'0FF' : 'Cyan', // MISSING
		'00F' : 'Blue', // MISSING
		'EE82EE' : 'Violet', // MISSING
		'A9A9A9' : 'Dim Gray', // MISSING
		'FFA07A' : 'Light Salmon', // MISSING
		'FFA500' : 'Orange', // MISSING
		'FFFF00' : 'Yellow', // MISSING
		'00FF00' : 'Lime', // MISSING
		'AFEEEE' : 'Pale Turquoise', // MISSING
		'ADD8E6' : 'Light Blue', // MISSING
		'DDA0DD' : 'Plum', // MISSING
		'D3D3D3' : 'Light Grey', // MISSING
		'FFF0F5' : 'Lavender Blush', // MISSING
		'FAEBD7' : 'Antique White', // MISSING
		'FFFFE0' : 'Light Yellow', // MISSING
		'F0FFF0' : 'Honeydew', // MISSING
		'F0FFFF' : 'Azure', // MISSING
		'F0F8FF' : 'Alice Blue', // MISSING
		'E6E6FA' : 'Lavender', // MISSING
		'FFF' : 'White' // MISSING
	},

	scayt :
	{
		title			: 'Kiểm tra chính tả ngay khi gõ chữ (SCAYT)',
		opera_title		: 'Không hỗ trợ trên trình duyệt Opera',
		enable			: 'Bật SCAYT',
		disable			: 'Tắt SCAYT',
		about			: 'Thông tin về SCAYT',
		toggle			: 'Bật tắt SCAYT',
		options			: 'Tùy chọn',
		langs			: 'Ngôn ngữ',
		moreSuggestions	: 'Đề xuất thêm',
		ignore			: 'Bỏ qua',
		ignoreAll		: 'Bỏ qua tất cả',
		addWord			: 'Thêm từ',
		emptyDic		: 'Tên của từ điển không được để trống.',

		optionsTab		: 'Tùy chọn',
		allCaps			: 'Không phân biệt chữ HOA chữ thường',
		ignoreDomainNames : 'Bỏ qua tên miền',
		mixedCase		: 'Không phân biệt loại chữ',
		mixedWithDigits	: 'Không phân biệt chữ và số',

		languagesTab	: 'Tab ngôn ngữ',

		dictionariesTab	: 'Từ điển',
		dic_field_name	: 'Tên từ điển',
		dic_create		: 'Tạo',
		dic_restore		: 'Phục hồi',
		dic_delete		: 'Xóa',
		dic_rename		: 'Thay tên',
		dic_info		: 'Initially the User Dictionary is stored in a Cookie. However, Cookies are limited in size. When the User Dictionary grows to a point where it cannot be stored in a Cookie, then the dictionary may be stored on our server. To store your personal dictionary on our server you should specify a name for your dictionary. If you already have a stored dictionary, please type its name and click the Restore button.', // MISSING

		aboutTab		: 'Thông tin'
	},

	about :
	{
		title		: 'Thông tin về CKEditor',
		dlgTitle	: 'Thông tin về CKEditor',
		help	: 'Check $1 for help.', // MISSING
		userGuide : 'CKEditor User\'s Guide', // MISSING
		moreInfo	: 'Vui lòng ghé thăm trang web của chúng tôi để có thông tin về giấy phép:',
		copy		: 'Bản quyền &copy; $1. Giữ toàn quyền.'
	},

	maximize : 'Phóng to tối đa',
	minimize : 'Thu nhỏ',

	fakeobjects :
	{
		anchor		: 'Điểm neo',
		flash		: 'Flash',
		iframe		: 'IFrame', // MISSING
		hiddenfield	: 'Hidden Field', // MISSING
		unknown		: 'Đối tượng không rõ ràng'
	},

	resize : 'Kéo rê để thay đổi kích cỡ',

	colordialog :
	{
		title		: 'Chọn màu',
		options	:	'Color Options', // MISSING
		highlight	: 'Màu chọn',
		selected	: 'Màu đã chọn',
		clear		: 'Xóa bỏ'
	},

	toolbarCollapse	: 'Thu gọn thanh công cụ',
	toolbarExpand	: 'Mở rộng thnah công cụ',

	toolbarGroups :
	{
		document : 'Document', // MISSING
		clipboard : 'Clipboard/Undo', // MISSING
		editing : 'Editing', // MISSING
		forms : 'Forms', // MISSING
		basicstyles : 'Basic Styles', // MISSING
		paragraph : 'Paragraph', // MISSING
		links : 'Links', // MISSING
		insert : 'Insert', // MISSING
		styles : 'Styles', // MISSING
		colors : 'Colors', // MISSING
		tools : 'Tools' // MISSING
	},

	bidi :
	{
		ltr : 'Text direction from left to right', // MISSING
		rtl : 'Text direction from right to left' // MISSING
	},

	docprops :
	{
		label : 'Thuộc tính Tài liệu',
		title : 'Thuộc tính Tài liệu',
		design : 'Design', // MISSING
		meta : 'Siêu dữ liệu',
		chooseColor : 'Chọn màu',
		other : '<khác>',
		docTitle :	'Tiêu đề Trang',
		charset : 	'Bảng mã ký tự',
		charsetOther : 'Bảng mã ký tự khác',
		charsetASCII : 'ASCII', // MISSING
		charsetCE : 'Trung Âu',
		charsetCT : 'Tiếng Trung Quốc (Big5)',
		charsetCR : 'Tiếng Kirin',
		charsetGR : 'Tiếng Hy Lạp',
		charsetJP : 'Tiếng Nhật',
		charsetKR : 'Tiếng Hàn',
		charsetTR : 'Tiếng Thổ Nhĩ Kỳ',
		charsetUN : 'Unicode (UTF-8)', // MISSING
		charsetWE : 'Tây Âu',
		docType : 'Kiểu Đề mục Tài liệu',
		docTypeOther : 'Kiểu Đề mục Tài liệu khác',
		xhtmlDec : 'Bao gồm cả định nghĩa XHTML',
		bgColor : 'Màu nền',
		bgImage : 'URL của Hình ảnh nền',
		bgFixed : 'Không cuộn nền',
		txtColor : 'Màu chữ',
		margin : 'Đường biên của Trang',
		marginTop : 'Trên',
		marginLeft : 'Trái',
		marginRight : 'Phải',
		marginBottom : 'Dưới',
		metaKeywords : 'Các từ khóa chỉ mục tài liệu (phân cách bởi dấu phẩy)',
		metaDescription : 'Mô tả tài liệu',
		metaAuthor : 'Tác giả',
		metaCopyright : 'Bản quyền',
		previewHtml : '<p>This is some <strong>sample text</strong>. You are using <a href="javascript:void(0)">CKEditor</a>.</p>' // MISSING
	}
};

Fossil version [6b472ae172] 2020-11-16 02:48:22


CKEditor - The text editor for Internet - https://ckeditor.com/
Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.

Licensed under the terms of any of the following licenses at your
choice:

 - GNU General Public License Version 2 or later (the "GPL")
   https://www.gnu.org/licenses/gpl.html
   (See Appendix A)

 - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
   https://www.gnu.org/licenses/lgpl.html
   (See Appendix B)

 - Mozilla Public License Version 1.1 or later (the "MPL")
   https://www.mozilla.org/MPL/MPL-1.1.html
   (See Appendix C)

You are not required to, but if you want to explicitly declare the
license you have chosen to be bound to when using, reproducing,
modifying and distributing this software, just include a text file
titled "legal.txt" in your version of this software, indicating your
license choice. In any case, your choice will not restrict any
recipient of your version of this software to use, reproduce, modify
and distribute this software under any of the above licenses.

Sources of Intellectual Property Included in CKEditor
-----------------------------------------------------

Where not otherwise indicated, all CKEditor content is authored by
CKSource engineers and consists of CKSource-owned intellectual
property. In some specific instances, CKEditor will incorporate work
done by developers outside of CKSource with their express permission.

The following libraries are included in CKEditor under the MIT license (see Appendix D):

* CKSource Samples Framework (included in the samples) - Copyright (c) 2014-2020, CKSource - Frederico Knabben.
* PicoModal (included in `samples/js/sf.js`) - Copyright (c) 2012 James Frasca.
* CodeMirror (included in the samples) - Copyright (C) 2014 by Marijn Haverbeke <marijnh@gmail.com> and others.
* ES6Promise - Copyright (c) 2014 Yehuda Katz, Tom Dale, Stefan Penner and contributors.

Parts of code taken from the following libraries are included in CKEditor under the MIT license (see Appendix D):

* jQuery (inspired the domReady function, ckeditor_base.js) - Copyright (c) 2011 John Resig, https://jquery.com/

The following libraries are included in CKEditor under the SIL Open Font License, Version 1.1 (see Appendix E):

* Font Awesome (included in the toolbar configurator) - Copyright (C) 2012 by Dave Gandy.

The following libraries are included in CKEditor under the BSD-3 License (see Appendix F):

* highlight.js (included in the `codesnippet` plugin) - Copyright (c) 2006, Ivan Sagalaev.
* YUI Library (included in the `uicolor` plugin) - Copyright (c) 2009, Yahoo! Inc.


Trademarks
----------

CKEditor is a trademark of CKSource - Frederico Knabben. All other brand
and product names are trademarks, registered trademarks or service
marks of their respective holders.

---

Appendix A: The GPL License
---------------------------

```
GNU GENERAL PUBLIC LICENSE
Version 2, June 1991

 Copyright (C) 1989, 1991 Free Software Foundation, Inc.,
 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
 Everyone is permitted to copy and distribute verbatim copies
 of this license document, but changing it is not allowed.

Preamble

  The licenses for most software are designed to take away your
freedom to share and change it.  By contrast, the GNU General Public
License is intended to guarantee your freedom to share and change free
software-to make sure the software is free for all its users.  This
General Public License applies to most of the Free Software
Foundation's software and to any other program whose authors commit to
using it.  (Some other Free Software Foundation software is covered by
the GNU Lesser General Public License instead.)  You can apply it to
your programs, too.

  When we speak of free software, we are referring to freedom, not
price.  Our General Public Licenses are designed to make sure that you
have the freedom to distribute copies of free software (and charge for
this service if you wish), that you receive source code or can get it
if you want it, that you can change the software or use pieces of it
in new free programs; and that you know you can do these things.

  To protect your rights, we need to make restrictions that forbid
anyone to deny you these rights or to ask you to surrender the rights.
These restrictions translate to certain responsibilities for you if you
distribute copies of the software, or if you modify it.

  For example, if you distribute copies of such a program, whether
gratis or for a fee, you must give the recipients all the rights that
you have.  You must make sure that they, too, receive or can get the
source code.  And you must show them these terms so they know their
rights.

  We protect your rights with two steps: (1) copyright the software, and
(2) offer you this license which gives you legal permission to copy,
distribute and/or modify the software.

  Also, for each author's protection and ours, we want to make certain
that everyone understands that there is no warranty for this free
software.  If the software is modified by someone else and passed on, we
want its recipients to know that what they have is not the original, so
that any problems introduced by others will not reflect on the original
authors' reputations.

  Finally, any free program is threatened constantly by software
patents.  We wish to avoid the danger that redistributors of a free
program will individually obtain patent licenses, in effect making the
program proprietary.  To prevent this, we have made it clear that any
patent must be licensed for everyone's free use or not licensed at all.

  The precise terms and conditions for copying, distribution and
modification follow.

GNU GENERAL PUBLIC LICENSE
TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION

  0. This License applies to any program or other work which contains
a notice placed by the copyright holder saying it may be distributed
under the terms of this General Public License.  The "Program", below,
refers to any such program or work, and a "work based on the Program"
means either the Program or any derivative work under copyright law:
that is to say, a work containing the Program or a portion of it,
either verbatim or with modifications and/or translated into another
language.  (Hereinafter, translation is included without limitation in
the term "modification".)  Each licensee is addressed as "you".

Activities other than copying, distribution and modification are not
covered by this License; they are outside its scope.  The act of
running the Program is not restricted, and the output from the Program
is covered only if its contents constitute a work based on the
Program (independent of having been made by running the Program).
Whether that is true depends on what the Program does.

  1. You may copy and distribute verbatim copies of the Program's
source code as you receive it, in any medium, provided that you
conspicuously and appropriately publish on each copy an appropriate
copyright notice and disclaimer of warranty; keep intact all the
notices that refer to this License and to the absence of any warranty;
and give any other recipients of the Program a copy of this License
along with the Program.

You may charge a fee for the physical act of transferring a copy, and
you may at your option offer warranty protection in exchange for a fee.

  2. You may modify your copy or copies of the Program or any portion
of it, thus forming a work based on the Program, and copy and
distribute such modifications or work under the terms of Section 1
above, provided that you also meet all of these conditions:

    a) You must cause the modified files to carry prominent notices
    stating that you changed the files and the date of any change.

    b) You must cause any work that you distribute or publish, that in
    whole or in part contains or is derived from the Program or any
    part thereof, to be licensed as a whole at no charge to all third
    parties under the terms of this License.

    c) If the modified program normally reads commands interactively
    when run, you must cause it, when started running for such
    interactive use in the most ordinary way, to print or display an
    announcement including an appropriate copyright notice and a
    notice that there is no warranty (or else, saying that you provide
    a warranty) and that users may redistribute the program under
    these conditions, and telling the user how to view a copy of this
    License.  (Exception: if the Program itself is interactive but
    does not normally print such an announcement, your work based on
    the Program is not required to print an announcement.)

These requirements apply to the modified work as a whole.  If
identifiable sections of that work are not derived from the Program,
and can be reasonably considered independent and separate works in
themselves, then this License, and its terms, do not apply to those
sections when you distribute them as separate works.  But when you
distribute the same sections as part of a whole which is a work based
on the Program, the distribution of the whole must be on the terms of
this License, whose permissions for other licensees extend to the
entire whole, and thus to each and every part regardless of who wrote it.

Thus, it is not the intent of this section to claim rights or contest
your rights to work written entirely by you; rather, the intent is to
exercise the right to control the distribution of derivative or
collective works based on the Program.

In addition, mere aggregation of another work not based on the Program
with the Program (or with a work based on the Program) on a volume of
a storage or distribution medium does not bring the other work under
the scope of this License.

  3. You may copy and distribute the Program (or a work based on it,
under Section 2) in object code or executable form under the terms of
Sections 1 and 2 above provided that you also do one of the following:

    a) Accompany it with the complete corresponding machine-readable
    source code, which must be distributed under the terms of Sections
    1 and 2 above on a medium customarily used for software interchange; or,

    b) Accompany it with a written offer, valid for at least three
    years, to give any third party, for a charge no more than your
    cost of physically performing source distribution, a complete
    machine-readable copy of the corresponding source code, to be
    distributed under the terms of Sections 1 and 2 above on a medium
    customarily used for software interchange; or,

    c) Accompany it with the information you received as to the offer
    to distribute corresponding source code.  (This alternative is
    allowed only for noncommercial distribution and only if you
    received the program in object code or executable form with such
    an offer, in accord with Subsection b above.)

The source code for a work means the preferred form of the work for
making modifications to it.  For an executable work, complete source
code means all the source code for all modules it contains, plus any
associated interface definition files, plus the scripts used to
control compilation and installation of the executable.  However, as a
special exception, the source code distributed need not include
anything that is normally distributed (in either source or binary
form) with the major components (compiler, kernel, and so on) of the
operating system on which the executable runs, unless that component
itself accompanies the executable.

If distribution of executable or object code is made by offering
access to copy from a designated place, then offering equivalent
access to copy the source code from the same place counts as
distribution of the source code, even though third parties are not
compelled to copy the source along with the object code.

  4. You may not copy, modify, sublicense, or distribute the Program
except as expressly provided under this License.  Any attempt
otherwise to copy, modify, sublicense or distribute the Program is
void, and will automatically terminate your rights under this License.
However, parties who have received copies, or rights, from you under
this License will not have their licenses terminated so long as such
parties remain in full compliance.

  5. You are not required to accept this License, since you have not
signed it.  However, nothing else grants you permission to modify or
distribute the Program or its derivative works.  These actions are
prohibited by law if you do not accept this License.  Therefore, by
modifying or distributing the Program (or any work based on the
Program), you indicate your acceptance of this License to do so, and
all its terms and conditions for copying, distributing or modifying
the Program or works based on it.

  6. Each time you redistribute the Program (or any work based on the
Program), the recipient automatically receives a license from the
original licensor to copy, distribute or modify the Program subject to
these terms and conditions.  You may not impose any further
restrictions on the recipients' exercise of the rights granted herein.
You are not responsible for enforcing compliance by third parties to
this License.

  7. If, as a consequence of a court judgment or allegation of patent
infringement or for any other reason (not limited to patent issues),
conditions are imposed on you (whether by court order, agreement or
otherwise) that contradict the conditions of this License, they do not
excuse you from the conditions of this License.  If you cannot
distribute so as to satisfy simultaneously your obligations under this
License and any other pertinent obligations, then as a consequence you
may not distribute the Program at all.  For example, if a patent
license would not permit royalty-free redistribution of the Program by
all those who receive copies directly or indirectly through you, then
the only way you could satisfy both it and this License would be to
refrain entirely from distribution of the Program.

If any portion of this section is held invalid or unenforceable under
any particular circumstance, the balance of the section is intended to
apply and the section as a whole is intended to apply in other
circumstances.

It is not the purpose of this section to induce you to infringe any
patents or other property right claims or to contest validity of any
such claims; this section has the sole purpose of protecting the
integrity of the free software distribution system, which is
implemented by public license practices.  Many people have made
generous contributions to the wide range of software distributed
through that system in reliance on consistent application of that
system; it is up to the author/donor to decide if he or she is willing
to distribute software through any other system and a licensee cannot
impose that choice.

This section is intended to make thoroughly clear what is believed to
be a consequence of the rest of this License.

  8. If the distribution and/or use of the Program is restricted in
certain countries either by patents or by copyrighted interfaces, the
original copyright holder who places the Program under this License
may add an explicit geographical distribution limitation excluding
those countries, so that distribution is permitted only in or among
countries not thus excluded.  In such case, this License incorporates
the limitation as if written in the body of this License.

  9. The Free Software Foundation may publish revised and/or new versions
of the General Public License from time to time.  Such new versions will
be similar in spirit to the present version, but may differ in detail to
address new problems or concerns.

Each version is given a distinguishing version number.  If the Program
specifies a version number of this License which applies to it and "any
later version", you have the option of following the terms and conditions
either of that version or of any later version published by the Free
Software Foundation.  If the Program does not specify a version number of
this License, you may choose any version ever published by the Free Software
Foundation.

  10. If you wish to incorporate parts of the Program into other free
programs whose distribution conditions are different, write to the author
to ask for permission.  For software which is copyrighted by the Free
Software Foundation, write to the Free Software Foundation; we sometimes
make exceptions for this.  Our decision will be guided by the two goals
of preserving the free status of all derivatives of our free software and
of promoting the sharing and reuse of software generally.

NO WARRANTY

  11. BECAUSE THE PROGRAM IS LICENSED FREE OF CHARGE, THERE IS NO WARRANTY
FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW.  EXCEPT WHEN
OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES
PROVIDE THE PROGRAM "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED
OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE.  THE ENTIRE RISK AS
TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU.  SHOULD THE
PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING,
REPAIR OR CORRECTION.

  12. IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN WRITING
WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MAY MODIFY AND/OR
REDISTRIBUTE THE PROGRAM AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES,
INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING
OUT OF THE USE OR INABILITY TO USE THE PROGRAM (INCLUDING BUT NOT LIMITED
TO LOSS OF DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY
YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER
PROGRAMS), EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE
POSSIBILITY OF SUCH DAMAGES.

END OF TERMS AND CONDITIONS
```

Appendix B: The LGPL License
----------------------------

```
GNU LESSER GENERAL PUBLIC LICENSE
Version 2.1, February 1999

 Copyright (C) 1991, 1999 Free Software Foundation, Inc.
     59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 Everyone is permitted to copy and distribute verbatim copies
 of this license document, but changing it is not allowed.

[This is the first released version of the Lesser GPL.  It also counts
 as the successor of the GNU Library Public License, version 2, hence
 the version number 2.1.]

Preamble

  The licenses for most software are designed to take away your
freedom to share and change it.  By contrast, the GNU General Public
Licenses are intended to guarantee your freedom to share and change
free software-to make sure the software is free for all its users.

  This license, the Lesser General Public License, applies to some
specially designated software packages-typically libraries-of the
Free Software Foundation and other authors who decide to use it.  You
can use it too, but we suggest you first think carefully about whether
this license or the ordinary General Public License is the better
strategy to use in any particular case, based on the explanations below.

  When we speak of free software, we are referring to freedom of use,
not price.  Our General Public Licenses are designed to make sure that
you have the freedom to distribute copies of free software (and charge
for this service if you wish); that you receive source code or can get
it if you want it; that you can change the software and use pieces of
it in new free programs; and that you are informed that you can do
these things.

  To protect your rights, we need to make restrictions that forbid
distributors to deny you these rights or to ask you to surrender these
rights.  These restrictions translate to certain responsibilities for
you if you distribute copies of the library or if you modify it.

  For example, if you distribute copies of the library, whether gratis
or for a fee, you must give the recipients all the rights that we gave
you.  You must make sure that they, too, receive or can get the source
code.  If you link other code with the library, you must provide
complete object files to the recipients, so that they can relink them
with the library after making changes to the library and recompiling
it.  And you must show them these terms so they know their rights.

  We protect your rights with a two-step method: (1) we copyright the
library, and (2) we offer you this license, which gives you legal
permission to copy, distribute and/or modify the library.

  To protect each distributor, we want to make it very clear that
there is no warranty for the free library.  Also, if the library is
modified by someone else and passed on, the recipients should know
that what they have is not the original version, so that the original
author's reputation will not be affected by problems that might be
introduced by others.

  Finally, software patents pose a constant threat to the existence of
any free program.  We wish to make sure that a company cannot
effectively restrict the users of a free program by obtaining a
restrictive license from a patent holder.  Therefore, we insist that
any patent license obtained for a version of the library must be
consistent with the full freedom of use specified in this license.

  Most GNU software, including some libraries, is covered by the
ordinary GNU General Public License.  This license, the GNU Lesser
General Public License, applies to certain designated libraries, and
is quite different from the ordinary General Public License.  We use
this license for certain libraries in order to permit linking those
libraries into non-free programs.

  When a program is linked with a library, whether statically or using
a shared library, the combination of the two is legally speaking a
combined work, a derivative of the original library.  The ordinary
General Public License therefore permits such linking only if the
entire combination fits its criteria of freedom.  The Lesser General
Public License permits more lax criteria for linking other code with
the library.

  We call this license the "Lesser" General Public License because it
does Less to protect the user's freedom than the ordinary General
Public License.  It also provides other free software developers Less
of an advantage over competing non-free programs.  These disadvantages
are the reason we use the ordinary General Public License for many
libraries.  However, the Lesser license provides advantages in certain
special circumstances.

  For example, on rare occasions, there may be a special need to
encourage the widest possible use of a certain library, so that it becomes
a de-facto standard.  To achieve this, non-free programs must be
allowed to use the library.  A more frequent case is that a free
library does the same job as widely used non-free libraries.  In this
case, there is little to gain by limiting the free library to free
software only, so we use the Lesser General Public License.

  In other cases, permission to use a particular library in non-free
programs enables a greater number of people to use a large body of
free software.  For example, permission to use the GNU C Library in
non-free programs enables many more people to use the whole GNU
operating system, as well as its variant, the GNU/Linux operating
system.

  Although the Lesser General Public License is Less protective of the
users' freedom, it does ensure that the user of a program that is
linked with the Library has the freedom and the wherewithal to run
that program using a modified version of the Library.

  The precise terms and conditions for copying, distribution and
modification follow.  Pay close attention to the difference between a
"work based on the library" and a "work that uses the library".  The
former contains code derived from the library, whereas the latter must
be combined with the library in order to run.

GNU LESSER GENERAL PUBLIC LICENSE
TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION

  0. This License Agreement applies to any software library or other
program which contains a notice placed by the copyright holder or
other authorized party saying it may be distributed under the terms of
this Lesser General Public License (also called "this License").
Each licensee is addressed as "you".

  A "library" means a collection of software functions and/or data
prepared so as to be conveniently linked with application programs
(which use some of those functions and data) to form executables.

  The "Library", below, refers to any such software library or work
which has been distributed under these terms.  A "work based on the
Library" means either the Library or any derivative work under
copyright law: that is to say, a work containing the Library or a
portion of it, either verbatim or with modifications and/or translated
straightforwardly into another language.  (Hereinafter, translation is
included without limitation in the term "modification".)

  "Source code" for a work means the preferred form of the work for
making modifications to it.  For a library, complete source code means
all the source code for all modules it contains, plus any associated
interface definition files, plus the scripts used to control compilation
and installation of the library.

  Activities other than copying, distribution and modification are not
covered by this License; they are outside its scope.  The act of
running a program using the Library is not restricted, and output from
such a program is covered only if its contents constitute a work based
on the Library (independent of the use of the Library in a tool for
writing it).  Whether that is true depends on what the Library does
and what the program that uses the Library does.

  1. You may copy and distribute verbatim copies of the Library's
complete source code as you receive it, in any medium, provided that
you conspicuously and appropriately publish on each copy an
appropriate copyright notice and disclaimer of warranty; keep intact
all the notices that refer to this License and to the absence of any
warranty; and distribute a copy of this License along with the
Library.

  You may charge a fee for the physical act of transferring a copy,
and you may at your option offer warranty protection in exchange for a
fee.

  2. You may modify your copy or copies of the Library or any portion
of it, thus forming a work based on the Library, and copy and
distribute such modifications or work under the terms of Section 1
above, provided that you also meet all of these conditions:

    a) The modified work must itself be a software library.

    b) You must cause the files modified to carry prominent notices
    stating that you changed the files and the date of any change.

    c) You must cause the whole of the work to be licensed at no
    charge to all third parties under the terms of this License.

    d) If a facility in the modified Library refers to a function or a
    table of data to be supplied by an application program that uses
    the facility, other than as an argument passed when the facility
    is invoked, then you must make a good faith effort to ensure that,
    in the event an application does not supply such function or
    table, the facility still operates, and performs whatever part of
    its purpose remains meaningful.

    (For example, a function in a library to compute square roots has
    a purpose that is entirely well-defined independent of the
    application.  Therefore, Subsection 2d requires that any
    application-supplied function or table used by this function must
    be optional: if the application does not supply it, the square
    root function must still compute square roots.)

These requirements apply to the modified work as a whole.  If
identifiable sections of that work are not derived from the Library,
and can be reasonably considered independent and separate works in
themselves, then this License, and its terms, do not apply to those
sections when you distribute them as separate works.  But when you
distribute the same sections as part of a whole which is a work based
on the Library, the distribution of the whole must be on the terms of
this License, whose permissions for other licensees extend to the
entire whole, and thus to each and every part regardless of who wrote
it.

Thus, it is not the intent of this section to claim rights or contest
your rights to work written entirely by you; rather, the intent is to
exercise the right to control the distribution of derivative or
collective works based on the Library.

In addition, mere aggregation of another work not based on the Library
with the Library (or with a work based on the Library) on a volume of
a storage or distribution medium does not bring the other work under
the scope of this License.

  3. You may opt to apply the terms of the ordinary GNU General Public
License instead of this License to a given copy of the Library.  To do
this, you must alter all the notices that refer to this License, so
that they refer to the ordinary GNU General Public License, version 2,
instead of to this License.  (If a newer version than version 2 of the
ordinary GNU General Public License has appeared, then you can specify
that version instead if you wish.)  Do not make any other change in
these notices.

  Once this change is made in a given copy, it is irreversible for
that copy, so the ordinary GNU General Public License applies to all
subsequent copies and derivative works made from that copy.

  This option is useful when you wish to copy part of the code of
the Library into a program that is not a library.

  4. You may copy and distribute the Library (or a portion or
derivative of it, under Section 2) in object code or executable form
under the terms of Sections 1 and 2 above provided that you accompany
it with the complete corresponding machine-readable source code, which
must be distributed under the terms of Sections 1 and 2 above on a
medium customarily used for software interchange.

  If distribution of object code is made by offering access to copy
from a designated place, then offering equivalent access to copy the
source code from the same place satisfies the requirement to
distribute the source code, even though third parties are not
compelled to copy the source along with the object code.

  5. A program that contains no derivative of any portion of the
Library, but is designed to work with the Library by being compiled or
linked with it, is called a "work that uses the Library".  Such a
work, in isolation, is not a derivative work of the Library, and
therefore falls outside the scope of this License.

  However, linking a "work that uses the Library" with the Library
creates an executable that is a derivative of the Library (because it
contains portions of the Library), rather than a "work that uses the
library".  The executable is therefore covered by this License.
Section 6 states terms for distribution of such executables.

  When a "work that uses the Library" uses material from a header file
that is part of the Library, the object code for the work may be a
derivative work of the Library even though the source code is not.
Whether this is true is especially significant if the work can be
linked without the Library, or if the work is itself a library.  The
threshold for this to be true is not precisely defined by law.

  If such an object file uses only numerical parameters, data
structure layouts and accessors, and small macros and small inline
functions (ten lines or less in length), then the use of the object
file is unrestricted, regardless of whether it is legally a derivative
work.  (Executables containing this object code plus portions of the
Library will still fall under Section 6.)

  Otherwise, if the work is a derivative of the Library, you may
distribute the object code for the work under the terms of Section 6.
Any executables containing that work also fall under Section 6,
whether or not they are linked directly with the Library itself.

  6. As an exception to the Sections above, you may also combine or
link a "work that uses the Library" with the Library to produce a
work containing portions of the Library, and distribute that work
under terms of your choice, provided that the terms permit
modification of the work for the customer's own use and reverse
engineering for debugging such modifications.

  You must give prominent notice with each copy of the work that the
Library is used in it and that the Library and its use are covered by
this License.  You must supply a copy of this License.  If the work
during execution displays copyright notices, you must include the
copyright notice for the Library among them, as well as a reference
directing the user to the copy of this License.  Also, you must do one
of these things:

    a) Accompany the work with the complete corresponding
    machine-readable source code for the Library including whatever
    changes were used in the work (which must be distributed under
    Sections 1 and 2 above); and, if the work is an executable linked
    with the Library, with the complete machine-readable "work that
    uses the Library", as object code and/or source code, so that the
    user can modify the Library and then relink to produce a modified
    executable containing the modified Library.  (It is understood
    that the user who changes the contents of definitions files in the
    Library will not necessarily be able to recompile the application
    to use the modified definitions.)

    b) Use a suitable shared library mechanism for linking with the
    Library.  A suitable mechanism is one that (1) uses at run time a
    copy of the library already present on the user's computer system,
    rather than copying library functions into the executable, and (2)
    will operate properly with a modified version of the library, if
    the user installs one, as long as the modified version is
    interface-compatible with the version that the work was made with.

    c) Accompany the work with a written offer, valid for at
    least three years, to give the same user the materials
    specified in Subsection 6a, above, for a charge no more
    than the cost of performing this distribution.

    d) If distribution of the work is made by offering access to copy
    from a designated place, offer equivalent access to copy the above
    specified materials from the same place.

    e) Verify that the user has already received a copy of these
    materials or that you have already sent this user a copy.

  For an executable, the required form of the "work that uses the
Library" must include any data and utility programs needed for
reproducing the executable from it.  However, as a special exception,
the materials to be distributed need not include anything that is
normally distributed (in either source or binary form) with the major
components (compiler, kernel, and so on) of the operating system on
which the executable runs, unless that component itself accompanies
the executable.

  It may happen that this requirement contradicts the license
restrictions of other proprietary libraries that do not normally
accompany the operating system.  Such a contradiction means you cannot
use both them and the Library together in an executable that you
distribute.

  7. You may place library facilities that are a work based on the
Library side-by-side in a single library together with other library
facilities not covered by this License, and distribute such a combined
library, provided that the separate distribution of the work based on
the Library and of the other library facilities is otherwise
permitted, and provided that you do these two things:

    a) Accompany the combined library with a copy of the same work
    based on the Library, uncombined with any other library
    facilities.  This must be distributed under the terms of the
    Sections above.

    b) Give prominent notice with the combined library of the fact
    that part of it is a work based on the Library, and explaining
    where to find the accompanying uncombined form of the same work.

  8. You may not copy, modify, sublicense, link with, or distribute
the Library except as expressly provided under this License.  Any
attempt otherwise to copy, modify, sublicense, link with, or
distribute the Library is void, and will automatically terminate your
rights under this License.  However, parties who have received copies,
or rights, from you under this License will not have their licenses
terminated so long as such parties remain in full compliance.

  9. You are not required to accept this License, since you have not
signed it.  However, nothing else grants you permission to modify or
distribute the Library or its derivative works.  These actions are
prohibited by law if you do not accept this License.  Therefore, by
modifying or distributing the Library (or any work based on the
Library), you indicate your acceptance of this License to do so, and
all its terms and conditions for copying, distributing or modifying
the Library or works based on it.

  10. Each time you redistribute the Library (or any work based on the
Library), the recipient automatically receives a license from the
original licensor to copy, distribute, link with or modify the Library
subject to these terms and conditions.  You may not impose any further
restrictions on the recipients' exercise of the rights granted herein.
You are not responsible for enforcing compliance by third parties with
this License.

  11. If, as a consequence of a court judgment or allegation of patent
infringement or for any other reason (not limited to patent issues),
conditions are imposed on you (whether by court order, agreement or
otherwise) that contradict the conditions of this License, they do not
excuse you from the conditions of this License.  If you cannot
distribute so as to satisfy simultaneously your obligations under this
License and any other pertinent obligations, then as a consequence you
may not distribute the Library at all.  For example, if a patent
license would not permit royalty-free redistribution of the Library by
all those who receive copies directly or indirectly through you, then
the only way you could satisfy both it and this License would be to
refrain entirely from distribution of the Library.

If any portion of this section is held invalid or unenforceable under any
particular circumstance, the balance of the section is intended to apply,
and the section as a whole is intended to apply in other circumstances.

It is not the purpose of this section to induce you to infringe any
patents or other property right claims or to contest validity of any
such claims; this section has the sole purpose of protecting the
integrity of the free software distribution system which is
implemented by public license practices.  Many people have made
generous contributions to the wide range of software distributed
through that system in reliance on consistent application of that
system; it is up to the author/donor to decide if he or she is willing
to distribute software through any other system and a licensee cannot
impose that choice.

This section is intended to make thoroughly clear what is believed to
be a consequence of the rest of this License.

  12. If the distribution and/or use of the Library is restricted in
certain countries either by patents or by copyrighted interfaces, the
original copyright holder who places the Library under this License may add
an explicit geographical distribution limitation excluding those countries,
so that distribution is permitted only in or among countries not thus
excluded.  In such case, this License incorporates the limitation as if
written in the body of this License.

  13. The Free Software Foundation may publish revised and/or new
versions of the Lesser General Public License from time to time.
Such new versions will be similar in spirit to the present version,
but may differ in detail to address new problems or concerns.

Each version is given a distinguishing version number.  If the Library
specifies a version number of this License which applies to it and
"any later version", you have the option of following the terms and
conditions either of that version or of any later version published by
the Free Software Foundation.  If the Library does not specify a
license version number, you may choose any version ever published by
the Free Software Foundation.

  14. If you wish to incorporate parts of the Library into other free
programs whose distribution conditions are incompatible with these,
write to the author to ask for permission.  For software which is
copyrighted by the Free Software Foundation, write to the Free
Software Foundation; we sometimes make exceptions for this.  Our
decision will be guided by the two goals of preserving the free status
of all derivatives of our free software and of promoting the sharing
and reuse of software generally.

NO WARRANTY

  15. BECAUSE THE LIBRARY IS LICENSED FREE OF CHARGE, THERE IS NO
WARRANTY FOR THE LIBRARY, TO THE EXTENT PERMITTED BY APPLICABLE LAW.
EXCEPT WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR
OTHER PARTIES PROVIDE THE LIBRARY "AS IS" WITHOUT WARRANTY OF ANY
KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE
IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
PURPOSE.  THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE
LIBRARY IS WITH YOU.  SHOULD THE LIBRARY PROVE DEFECTIVE, YOU ASSUME
THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.

  16. IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN
WRITING WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MAY MODIFY
AND/OR REDISTRIBUTE THE LIBRARY AS PERMITTED ABOVE, BE LIABLE TO YOU
FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR
CONSEQUENTIAL DAMAGES ARISING OUT OF THE USE OR INABILITY TO USE THE
LIBRARY (INCLUDING BUT NOT LIMITED TO LOSS OF DATA OR DATA BEING
RENDERED INACCURATE OR LOSSES SUSTAINED BY YOU OR THIRD PARTIES OR A
FAILURE OF THE LIBRARY TO OPERATE WITH ANY OTHER SOFTWARE), EVEN IF
SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH
DAMAGES.

END OF TERMS AND CONDITIONS
```

Appendix C: The MPL License
---------------------------

```
MOZILLA PUBLIC LICENSE
Version 1.1

1. Definitions.

     1.0.1. "Commercial Use" means distribution or otherwise making the
     Covered Code available to a third party.

     1.1. "Contributor" means each entity that creates or contributes to
     the creation of Modifications.

     1.2. "Contributor Version" means the combination of the Original
     Code, prior Modifications used by a Contributor, and the Modifications
     made by that particular Contributor.

     1.3. "Covered Code" means the Original Code or Modifications or the
     combination of the Original Code and Modifications, in each case
     including portions thereof.

     1.4. "Electronic Distribution Mechanism" means a mechanism generally
     accepted in the software development community for the electronic
     transfer of data.

     1.5. "Executable" means Covered Code in any form other than Source
     Code.

     1.6. "Initial Developer" means the individual or entity identified
     as the Initial Developer in the Source Code notice required by Exhibit
     A.

     1.7. "Larger Work" means a work which combines Covered Code or
     portions thereof with code not governed by the terms of this License.

     1.8. "License" means this document.

     1.8.1. "Licensable" means having the right to grant, to the maximum
     extent possible, whether at the time of the initial grant or
     subsequently acquired, any and all of the rights conveyed herein.

     1.9. "Modifications" means any addition to or deletion from the
     substance or structure of either the Original Code or any previous
     Modifications. When Covered Code is released as a series of files, a
     Modification is:
          A. Any addition to or deletion from the contents of a file
          containing Original Code or previous Modifications.

          B. Any new file that contains any part of the Original Code or
          previous Modifications.

     1.10. "Original Code" means Source Code of computer software code
     which is described in the Source Code notice required by Exhibit A as
     Original Code, and which, at the time of its release under this
     License is not already Covered Code governed by this License.

     1.10.1. "Patent Claims" means any patent claim(s), now owned or
     hereafter acquired, including without limitation,  method, process,
     and apparatus claims, in any patent Licensable by grantor.

     1.11. "Source Code" means the preferred form of the Covered Code for
     making modifications to it, including all modules it contains, plus
     any associated interface definition files, scripts used to control
     compilation and installation of an Executable, or source code
     differential comparisons against either the Original Code or another
     well known, available Covered Code of the Contributor's choice. The
     Source Code can be in a compressed or archival form, provided the
     appropriate decompression or de-archiving software is widely available
     for no charge.

     1.12. "You" (or "Your")  means an individual or a legal entity
     exercising rights under, and complying with all of the terms of, this
     License or a future version of this License issued under Section 6.1.
     For legal entities, "You" includes any entity which controls, is
     controlled by, or is under common control with You. For purposes of
     this definition, "control" means (a) the power, direct or indirect,
     to cause the direction or management of such entity, whether by
     contract or otherwise, or (b) ownership of more than fifty percent
     (50%) of the outstanding shares or beneficial ownership of such
     entity.

2. Source Code License.

     2.1. The Initial Developer Grant.
     The Initial Developer hereby grants You a world-wide, royalty-free,
     non-exclusive license, subject to third party intellectual property
     claims:
          (a)  under intellectual property rights (other than patent or
          trademark) Licensable by Initial Developer to use, reproduce,
          modify, display, perform, sublicense and distribute the Original
          Code (or portions thereof) with or without Modifications, and/or
          as part of a Larger Work; and

          (b) under Patents Claims infringed by the making, using or
          selling of Original Code, to make, have made, use, practice,
          sell, and offer for sale, and/or otherwise dispose of the
          Original Code (or portions thereof).

          (c) the licenses granted in this Section 2.1(a) and (b) are
          effective on the date Initial Developer first distributes
          Original Code under the terms of this License.

          (d) Notwithstanding Section 2.1(b) above, no patent license is
          granted: 1) for code that You delete from the Original Code; 2)
          separate from the Original Code;  or 3) for infringements caused
          by: i) the modification of the Original Code or ii) the
          combination of the Original Code with other software or devices.

     2.2. Contributor Grant.
     Subject to third party intellectual property claims, each Contributor
     hereby grants You a world-wide, royalty-free, non-exclusive license

          (a)  under intellectual property rights (other than patent or
          trademark) Licensable by Contributor, to use, reproduce, modify,
          display, perform, sublicense and distribute the Modifications
          created by such Contributor (or portions thereof) either on an
          unmodified basis, with other Modifications, as Covered Code
          and/or as part of a Larger Work; and

          (b) under Patent Claims infringed by the making, using, or
          selling of  Modifications made by that Contributor either alone
          and/or in combination with its Contributor Version (or portions
          of such combination), to make, use, sell, offer for sale, have
          made, and/or otherwise dispose of: 1) Modifications made by that
          Contributor (or portions thereof); and 2) the combination of
          Modifications made by that Contributor with its Contributor
          Version (or portions of such combination).

          (c) the licenses granted in Sections 2.2(a) and 2.2(b) are
          effective on the date Contributor first makes Commercial Use of
          the Covered Code.

          (d)    Notwithstanding Section 2.2(b) above, no patent license is
          granted: 1) for any code that Contributor has deleted from the
          Contributor Version; 2)  separate from the Contributor Version;
          3)  for infringements caused by: i) third party modifications of
          Contributor Version or ii)  the combination of Modifications made
          by that Contributor with other software  (except as part of the
          Contributor Version) or other devices; or 4) under Patent Claims
          infringed by Covered Code in the absence of Modifications made by
          that Contributor.

3. Distribution Obligations.

     3.1. Application of License.
     The Modifications which You create or to which You contribute are
     governed by the terms of this License, including without limitation
     Section 2.2. The Source Code version of Covered Code may be
     distributed only under the terms of this License or a future version
     of this License released under Section 6.1, and You must include a
     copy of this License with every copy of the Source Code You
     distribute. You may not offer or impose any terms on any Source Code
     version that alters or restricts the applicable version of this
     License or the recipients' rights hereunder. However, You may include
     an additional document offering the additional rights described in
     Section 3.5.

     3.2. Availability of Source Code.
     Any Modification which You create or to which You contribute must be
     made available in Source Code form under the terms of this License
     either on the same media as an Executable version or via an accepted
     Electronic Distribution Mechanism to anyone to whom you made an
     Executable version available; and if made available via Electronic
     Distribution Mechanism, must remain available for at least twelve (12)
     months after the date it initially became available, or at least six
     (6) months after a subsequent version of that particular Modification
     has been made available to such recipients. You are responsible for
     ensuring that the Source Code version remains available even if the
     Electronic Distribution Mechanism is maintained by a third party.

     3.3. Description of Modifications.
     You must cause all Covered Code to which You contribute to contain a
     file documenting the changes You made to create that Covered Code and
     the date of any change. You must include a prominent statement that
     the Modification is derived, directly or indirectly, from Original
     Code provided by the Initial Developer and including the name of the
     Initial Developer in (a) the Source Code, and (b) in any notice in an
     Executable version or related documentation in which You describe the
     origin or ownership of the Covered Code.

     3.4. Intellectual Property Matters
          (a) Third Party Claims.
          If Contributor has knowledge that a license under a third party's
          intellectual property rights is required to exercise the rights
          granted by such Contributor under Sections 2.1 or 2.2,
          Contributor must include a text file with the Source Code
          distribution titled "LEGAL" which describes the claim and the
          party making the claim in sufficient detail that a recipient will
          know whom to contact. If Contributor obtains such knowledge after
          the Modification is made available as described in Section 3.2,
          Contributor shall promptly modify the LEGAL file in all copies
          Contributor makes available thereafter and shall take other steps
          (such as notifying appropriate mailing lists or newsgroups)
          reasonably calculated to inform those who received the Covered
          Code that new knowledge has been obtained.

          (b) Contributor APIs.
          If Contributor's Modifications include an application programming
          interface and Contributor has knowledge of patent licenses which
          are reasonably necessary to implement that API, Contributor must
          also include this information in the LEGAL file.

               (c)    Representations.
          Contributor represents that, except as disclosed pursuant to
          Section 3.4(a) above, Contributor believes that Contributor's
          Modifications are Contributor's original creation(s) and/or
          Contributor has sufficient rights to grant the rights conveyed by
          this License.

     3.5. Required Notices.
     You must duplicate the notice in Exhibit A in each file of the Source
     Code.  If it is not possible to put such notice in a particular Source
     Code file due to its structure, then You must include such notice in a
     location (such as a relevant directory) where a user would be likely
     to look for such a notice.  If You created one or more Modification(s)
     You may add your name as a Contributor to the notice described in
     Exhibit A.  You must also duplicate this License in any documentation
     for the Source Code where You describe recipients' rights or ownership
     rights relating to Covered Code.  You may choose to offer, and to
     charge a fee for, warranty, support, indemnity or liability
     obligations to one or more recipients of Covered Code. However, You
     may do so only on Your own behalf, and not on behalf of the Initial
     Developer or any Contributor. You must make it absolutely clear than
     any such warranty, support, indemnity or liability obligation is
     offered by You alone, and You hereby agree to indemnify the Initial
     Developer and every Contributor for any liability incurred by the
     Initial Developer or such Contributor as a result of warranty,
     support, indemnity or liability terms You offer.

     3.6. Distribution of Executable Versions.
     You may distribute Covered Code in Executable form only if the
     requirements of Section 3.1-3.5 have been met for that Covered Code,
     and if You include a notice stating that the Source Code version of
     the Covered Code is available under the terms of this License,
     including a description of how and where You have fulfilled the
     obligations of Section 3.2. The notice must be conspicuously included
     in any notice in an Executable version, related documentation or
     collateral in which You describe recipients' rights relating to the
     Covered Code. You may distribute the Executable version of Covered
     Code or ownership rights under a license of Your choice, which may
     contain terms different from this License, provided that You are in
     compliance with the terms of this License and that the license for the
     Executable version does not attempt to limit or alter the recipient's
     rights in the Source Code version from the rights set forth in this
     License. If You distribute the Executable version under a different
     license You must make it absolutely clear that any terms which differ
     from this License are offered by You alone, not by the Initial
     Developer or any Contributor. You hereby agree to indemnify the
     Initial Developer and every Contributor for any liability incurred by
     the Initial Developer or such Contributor as a result of any such
     terms You offer.

     3.7. Larger Works.
     You may create a Larger Work by combining Covered Code with other code
     not governed by the terms of this License and distribute the Larger
     Work as a single product. In such a case, You must make sure the
     requirements of this License are fulfilled for the Covered Code.

4. Inability to Comply Due to Statute or Regulation.

     If it is impossible for You to comply with any of the terms of this
     License with respect to some or all of the Covered Code due to
     statute, judicial order, or regulation then You must: (a) comply with
     the terms of this License to the maximum extent possible; and (b)
     describe the limitations and the code they affect. Such description
     must be included in the LEGAL file described in Section 3.4 and must
     be included with all distributions of the Source Code. Except to the
     extent prohibited by statute or regulation, such description must be
     sufficiently detailed for a recipient of ordinary skill to be able to
     understand it.

5. Application of this License.

     This License applies to code to which the Initial Developer has
     attached the notice in Exhibit A and to related Covered Code.

6. Versions of the License.

     6.1. New Versions.
     Netscape Communications Corporation ("Netscape") may publish revised
     and/or new versions of the License from time to time. Each version
     will be given a distinguishing version number.

     6.2. Effect of New Versions.
     Once Covered Code has been published under a particular version of the
     License, You may always continue to use it under the terms of that
     version. You may also choose to use such Covered Code under the terms
     of any subsequent version of the License published by Netscape. No one
     other than Netscape has the right to modify the terms applicable to
     Covered Code created under this License.

     6.3. Derivative Works.
     If You create or use a modified version of this License (which you may
     only do in order to apply it to code which is not already Covered Code
     governed by this License), You must (a) rename Your license so that
     the phrases "Mozilla", "MOZILLAPL", "MOZPL", "Netscape",
     "MPL", "NPL" or any confusingly similar phrase do not appear in your
     license (except to note that your license differs from this License)
     and (b) otherwise make it clear that Your version of the license
     contains terms which differ from the Mozilla Public License and
     Netscape Public License. (Filling in the name of the Initial
     Developer, Original Code or Contributor in the notice described in
     Exhibit A shall not of themselves be deemed to be modifications of
     this License.)

7. DISCLAIMER OF WARRANTY.

     COVERED CODE IS PROVIDED UNDER THIS LICENSE ON AN "AS IS" BASIS,
     WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING,
     WITHOUT LIMITATION, WARRANTIES THAT THE COVERED CODE IS FREE OF
     DEFECTS, MERCHANTABLE, FIT FOR A PARTICULAR PURPOSE OR NON-INFRINGING.
     THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE COVERED CODE
     IS WITH YOU. SHOULD ANY COVERED CODE PROVE DEFECTIVE IN ANY RESPECT,
     YOU (NOT THE INITIAL DEVELOPER OR ANY OTHER CONTRIBUTOR) ASSUME THE
     COST OF ANY NECESSARY SERVICING, REPAIR OR CORRECTION. THIS DISCLAIMER
     OF WARRANTY CONSTITUTES AN ESSENTIAL PART OF THIS LICENSE. NO USE OF
     ANY COVERED CODE IS AUTHORIZED HEREUNDER EXCEPT UNDER THIS DISCLAIMER.

8. TERMINATION.

     8.1.  This License and the rights granted hereunder will terminate
     automatically if You fail to comply with terms herein and fail to cure
     such breach within 30 days of becoming aware of the breach. All
     sublicenses to the Covered Code which are properly granted shall
     survive any termination of this License. Provisions which, by their
     nature, must remain in effect beyond the termination of this License
     shall survive.

     8.2.  If You initiate litigation by asserting a patent infringement
     claim (excluding declatory judgment actions) against Initial Developer
     or a Contributor (the Initial Developer or Contributor against whom
     You file such action is referred to as "Participant")  alleging that:

     (a)  such Participant's Contributor Version directly or indirectly
     infringes any patent, then any and all rights granted by such
     Participant to You under Sections 2.1 and/or 2.2 of this License
     shall, upon 60 days notice from Participant terminate prospectively,
     unless if within 60 days after receipt of notice You either: (i)
     agree in writing to pay Participant a mutually agreeable reasonable
     royalty for Your past and future use of Modifications made by such
     Participant, or (ii) withdraw Your litigation claim with respect to
     the Contributor Version against such Participant.  If within 60 days
     of notice, a reasonable royalty and payment arrangement are not
     mutually agreed upon in writing by the parties or the litigation claim
     is not withdrawn, the rights granted by Participant to You under
     Sections 2.1 and/or 2.2 automatically terminate at the expiration of
     the 60 day notice period specified above.

     (b)  any software, hardware, or device, other than such Participant's
     Contributor Version, directly or indirectly infringes any patent, then
     any rights granted to You by such Participant under Sections 2.1(b)
     and 2.2(b) are revoked effective as of the date You first made, used,
     sold, distributed, or had made, Modifications made by that
     Participant.

     8.3.  If You assert a patent infringement claim against Participant
     alleging that such Participant's Contributor Version directly or
     indirectly infringes any patent where such claim is resolved (such as
     by license or settlement) prior to the initiation of patent
     infringement litigation, then the reasonable value of the licenses
     granted by such Participant under Sections 2.1 or 2.2 shall be taken
     into account in determining the amount or value of any payment or
     license.

     8.4.  In the event of termination under Sections 8.1 or 8.2 above,
     all end user license agreements (excluding distributors and resellers)
     which have been validly granted by You or any distributor hereunder
     prior to termination shall survive termination.

9. LIMITATION OF LIABILITY.

     UNDER NO CIRCUMSTANCES AND UNDER NO LEGAL THEORY, WHETHER TORT
     (INCLUDING NEGLIGENCE), CONTRACT, OR OTHERWISE, SHALL YOU, THE INITIAL
     DEVELOPER, ANY OTHER CONTRIBUTOR, OR ANY DISTRIBUTOR OF COVERED CODE,
     OR ANY SUPPLIER OF ANY OF SUCH PARTIES, BE LIABLE TO ANY PERSON FOR
     ANY INDIRECT, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES OF ANY
     CHARACTER INCLUDING, WITHOUT LIMITATION, DAMAGES FOR LOSS OF GOODWILL,
     WORK STOPPAGE, COMPUTER FAILURE OR MALFUNCTION, OR ANY AND ALL OTHER
     COMMERCIAL DAMAGES OR LOSSES, EVEN IF SUCH PARTY SHALL HAVE BEEN
     INFORMED OF THE POSSIBILITY OF SUCH DAMAGES. THIS LIMITATION OF
     LIABILITY SHALL NOT APPLY TO LIABILITY FOR DEATH OR PERSONAL INJURY
     RESULTING FROM SUCH PARTY'S NEGLIGENCE TO THE EXTENT APPLICABLE LAW
     PROHIBITS SUCH LIMITATION. SOME JURISDICTIONS DO NOT ALLOW THE
     EXCLUSION OR LIMITATION OF INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO
     THIS EXCLUSION AND LIMITATION MAY NOT APPLY TO YOU.

10. U.S. GOVERNMENT END USERS.

     The Covered Code is a "commercial item," as that term is defined in
     48 C.F.R. 2.101 (Oct. 1995), consisting of "commercial computer
     software" and "commercial computer software documentation," as such
     terms are used in 48 C.F.R. 12.212 (Sept. 1995). Consistent with 48
     C.F.R. 12.212 and 48 C.F.R. 227.7202-1 through 227.7202-4 (June 1995),
     all U.S. Government End Users acquire Covered Code with only those
     rights set forth herein.

11. MISCELLANEOUS.

     This License represents the complete agreement concerning subject
     matter hereof. If any provision of this License is held to be
     unenforceable, such provision shall be reformed only to the extent
     necessary to make it enforceable. This License shall be governed by
     California law provisions (except to the extent applicable law, if
     any, provides otherwise), excluding its conflict-of-law provisions.
     With respect to disputes in which at least one party is a citizen of,
     or an entity chartered or registered to do business in the United
     States of America, any litigation relating to this License shall be
     subject to the jurisdiction of the Federal Courts of the Northern
     District of California, with venue lying in Santa Clara County,
     California, with the losing party responsible for costs, including
     without limitation, court costs and reasonable attorneys' fees and
     expenses. The application of the United Nations Convention on
     Contracts for the International Sale of Goods is expressly excluded.
     Any law or regulation which provides that the language of a contract
     shall be construed against the drafter shall not apply to this
     License.

12. RESPONSIBILITY FOR CLAIMS.

     As between Initial Developer and the Contributors, each party is
     responsible for claims and damages arising, directly or indirectly,
     out of its utilization of rights under this License and You agree to
     work with Initial Developer and Contributors to distribute such
     responsibility on an equitable basis. Nothing herein is intended or
     shall be deemed to constitute any admission of liability.

13. MULTIPLE-LICENSED CODE.

     Initial Developer may designate portions of the Covered Code as
     "Multiple-Licensed".  "Multiple-Licensed" means that the Initial
     Developer permits you to utilize portions of the Covered Code under
     Your choice of the NPL or the alternative licenses, if any, specified
     by the Initial Developer in the file described in Exhibit A.

EXHIBIT A -Mozilla Public License.

     ``The contents of this file are subject to the Mozilla Public License
     Version 1.1 (the "License"); you may not use this file except in
     compliance with the License. You may obtain a copy of the License at
     http://www.mozilla.org/MPL/

     Software distributed under the License is distributed on an "AS IS"
     basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
     License for the specific language governing rights and limitations
     under the License.

     The Original Code is ______________________________________.

     The Initial Developer of the Original Code is ________________________.
     Portions created by ______________________ are Copyright (C) ______
     _______________________. All Rights Reserved.

     Contributor(s): ______________________________________.

     Alternatively, the contents of this file may be used under the terms
     of the _____ license (the  "[___] License"), in which case the
     provisions of [______] License are applicable instead of those
     above.  If you wish to allow use of your version of this file only
     under the terms of the [____] License and not to allow others to use
     your version of this file under the MPL, indicate your decision by
     deleting  the provisions above and replace  them with the notice and
     other provisions required by the [___] License.  If you do not delete
     the provisions above, a recipient may use your version of this file
     under either the MPL or the [___] License."

     [NOTE: The text of this Exhibit A may differ slightly from the text of
     the notices in the Source Code files of the Original Code. You should
     use the text of this Exhibit A rather than the text found in the
     Original Code Source Code for Your Modifications.]
```

Appendix D: The MIT License
---------------------------

```
The MIT License (MIT)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
```

Appendix E: The SIL Open Font License Version 1.1
---------------------------------------------

```
SIL OPEN FONT LICENSE Version 1.1 - 26 February 2007
-----------------------------------------------------------

PREAMBLE
The goals of the Open Font License (OFL) are to stimulate worldwide
development of collaborative font projects, to support the font creation
efforts of academic and linguistic communities, and to provide a free and
open framework in which fonts may be shared and improved in partnership
with others.

The OFL allows the licensed fonts to be used, studied, modified and
redistributed freely as long as they are not sold by themselves. The
fonts, including any derivative works, can be bundled, embedded,
redistributed and/or sold with any software provided that any reserved
names are not used by derivative works. The fonts and derivatives,
however, cannot be released under any other type of license. The
requirement for fonts to remain under this license does not apply
to any document created using the fonts or their derivatives.

DEFINITIONS
"Font Software" refers to the set of files released by the Copyright
Holder(s) under this license and clearly marked as such. This may
include source files, build scripts and documentation.

"Reserved Font Name" refers to any names specified as such after the
copyright statement(s).

"Original Version" refers to the collection of Font Software components as
distributed by the Copyright Holder(s).

"Modified Version" refers to any derivative made by adding to, deleting,
or substituting -- in part or in whole -- any of the components of the
Original Version, by changing formats or by porting the Font Software to a
new environment.

"Author" refers to any designer, engineer, programmer, technical
writer or other person who contributed to the Font Software.

PERMISSION & CONDITIONS
Permission is hereby granted, free of charge, to any person obtaining
a copy of the Font Software, to use, study, copy, merge, embed, modify,
redistribute, and sell modified and unmodified copies of the Font
Software, subject to the following conditions:

1) Neither the Font Software nor any of its individual components,
in Original or Modified Versions, may be sold by itself.

2) Original or Modified Versions of the Font Software may be bundled,
redistributed and/or sold with any software, provided that each copy
contains the above copyright notice and this license. These can be
included either as stand-alone text files, human-readable headers or
in the appropriate machine-readable metadata fields within text or
binary files as long as those fields can be easily viewed by the user.

3) No Modified Version of the Font Software may use the Reserved Font
Name(s) unless explicit written permission is granted by the corresponding
Copyright Holder. This restriction only applies to the primary font name as
presented to the users.

4) The name(s) of the Copyright Holder(s) or the Author(s) of the Font
Software shall not be used to promote, endorse or advertise any
Modified Version, except to acknowledge the contribution(s) of the
Copyright Holder(s) and the Author(s) or with their explicit written
permission.

5) The Font Software, modified or unmodified, in part or in whole,
must be distributed entirely under this license, and must not be
distributed under any other license. The requirement for fonts to
remain under this license does not apply to any document created
using the Font Software.

TERMINATION
This license becomes null and void if any of the above conditions are
not met.

DISCLAIMER
THE FONT SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO ANY WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT
OF COPYRIGHT, PATENT, TRADEMARK, OR OTHER RIGHT. IN NO EVENT SHALL THE
COPYRIGHT HOLDER BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
INCLUDING ANY GENERAL, SPECIAL, INDIRECT, INCIDENTAL, OR CONSEQUENTIAL
DAMAGES, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF THE USE OR INABILITY TO USE THE FONT SOFTWARE OR FROM
OTHER DEALINGS IN THE FONT SOFTWARE.
```

Appendix F: The BSD-3 License
-----------------------------

```
Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

3. Neither the name of the copyright holder nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
```

