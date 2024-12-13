import React, { useRef, useState } from 'react';
import './index.css';
import Navbar from './components/Navbar';
import FormGenerator from './components/FormGenerator';
import Books from './components/Book';
import jsPDF from 'jspdf';
import html2canvas from 'html2canvas';

function App() {
	const pdfRef = useRef();
	const [selectedBookstore, setSelectedBookstore] = useState('');
	const [isBibilotekaSelected, setIsBibilotekaSelected] = useState(false); // Adjust this based on your conditions

	const saveAsPDF = () => {
		const input = pdfRef.current;
		html2canvas(input, {
			scale: 1.5,
			ignoreElements: (element) => element.classList.contains('no-print'),
		}) // Use a lower scale for better size reduction
			.then((canvas) => {
				const imgData = canvas.toDataURL('image/jpeg', 0.5); // Use JPEG format with a quality of 0.5
				const pdf = new jsPDF('p', 'mm', 'a4');
				const imgWidth = 210;
				const pageHeight = 295;
				const imgHeight = (canvas.height * imgWidth) / canvas.width;
				let heightLeft = imgHeight;

				let position = 50; // Set padding from the top of the PDF

				// Set the font size for the PDF
				pdf.setFontSize(30); // Set font size to 30 for the PDF

				pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
				heightLeft -= pageHeight;

				while (heightLeft >= 0) {
					position = heightLeft - imgHeight + 50; // Maintain padding for subsequent pages
					pdf.addPage();
					pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
					heightLeft -= pageHeight;
				}

				pdf.save('document.pdf');
			});
	};

	const handleBookstoreChange = (event) => {
		setSelectedBookstore(event.target.value);
	};

	return (
		<div>
			<Navbar />

			<div ref={pdfRef} className='pdf-content'>
				<FormGenerator />
				<Books
					isBibilotekaSelected={isBibilotekaSelected}
					selectedBookstore={selectedBookstore}
				/>
			</div>
			<div style={{ textAlign: 'center', margin: '20px' }}>
				<button onClick={saveAsPDF}>Save as PDF</button>
			</div>
		</div>
	);
}

export default App;
