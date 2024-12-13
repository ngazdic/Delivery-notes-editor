import React, { useState, useEffect } from 'react';
import Logo from '../assets/01.png';
import { bookstores } from '../data';
import Books from './Book';

function FormGenerator() {
	const [selectedDateNumber, setSelectedDateNumber] = useState({
		datumIzdavanja: '',
		datumOtpremanja: '',
		brojOtpremnice: 0,
	});

	const [selectedBookstore, setSelectedBookstore] = useState(''); // Držite trenutno izabranu knjižaru
	const [bibilotekaInfo, setBibilotekaInfo] = useState({
		name: '',
		address: '',
	});

	const [rows, setRows] = useState([
		{ name: '', barCode: '', cena: 0, rabat: 0, cenaSaRabatom: 0, kolicina: 1 },
	]); // Početno stanje sa jednim redom

	// Use effect to load the brojOtpremnice from local storage on mount
	useEffect(() => {
		const storedBrojOtpremnice = localStorage.getItem('brojOtpremnice');
		if (storedBrojOtpremnice) {
			setSelectedDateNumber((prevState) => ({
				...prevState,
				brojOtpremnice: parseInt(storedBrojOtpremnice, 10),
			}));
		}
	}, []);

	// Use effect to save brojOtpremnice in local storage whenever it changes
	useEffect(() => {
		localStorage.setItem('brojOtpremnice', selectedDateNumber.brojOtpremnice);
	}, [selectedDateNumber.brojOtpremnice]);

	function handleDateChange(event) {
		const { name, value } = event.target;
		setSelectedDateNumber((prevState) => ({
			...prevState,
			[name]: value,
		}));
	}

	function bookstoreShow(event) {
		const selectedValue = event.target.value;
		setSelectedBookstore(selectedValue);

		setRows([
			{
				name: '',
				barCode: '',
				cena: 0,
				rabat: 0,
				cenaSaRabatom: 0,
				kolicina: 1,
			},
		]);

		// Resetujte informaciju o biblioteci
		if (selectedValue !== 'bibiloteka') {
			setBibilotekaInfo({
				name: '',
				address: '',
				MB: '',
				PIB: '',
				email: '',
				phone: '',
			});
		}
	}

	function handleBibilotekaChange(event) {
		const { name, value } = event.target;
		setBibilotekaInfo((prevInfo) => ({
			...prevInfo,
			[name]: value,
		}));
	}

	function incrementBrojOtpremnice() {
		setSelectedDateNumber((prevState) => ({
			...prevState,
			brojOtpremnice: prevState.brojOtpremnice + 1,
		}));
	}

	return (
		<section className='main-section'>
			<div className='container'>
				<div className='row'>
					<div className='col-7 d-flex justify-content-start'>
						<div>
							<h2>Darma Books</h2>
							<p>Moše Pijade br. 2, 31330 Priboj</p>
							<p>PIB 110663104</p>
							<p>
								darmabooks.izdavastvo<span>@</span>gmail.com
							</p>
							<p>www.darmabooks.com</p>
							<p>064/935-9631 Matični broj: 64942964</p>
							<p>Tekući račun: 160-506900-45 Banca Intesa Ad</p>
						</div>
						<figure>
							<img src={Logo} alt='logo' />
						</figure>
					</div>

					<div className='col-5'>
						<label className='pe-4 mb-3' htmlFor='number'>
							Otpremnica <span> </span>broj:
						</label>
						<input
							className='w-25'
							type='number'
							name='brojOtpremnice'
							id='number'
							value={selectedDateNumber.brojOtpremnice}
							onChange={handleDateChange}
							min='0'
						/>
						<span> /24</span>

						<form>
							<label className='pe-4 mb-3' htmlFor='date'>
								Datum izdavanja:
							</label>
							<input
								type='date'
								id='date'
								name='datumIzdavanja'
								value={selectedDateNumber.datumIzdavanja}
								onChange={handleDateChange}
							/>
							<br />
							<label className='pe-4' htmlFor='date'>
								Datum prometa:{' '}
							</label>
							<input
								type='date'
								id='date'
								name='datumOtpremanja'
								value={selectedDateNumber.datumOtpremanja}
								onChange={handleDateChange}
							/>
						</form>
					</div>
				</div>
			</div>

			<div className='container'>
				<label htmlFor='bookstore' className='no-print mb-3 pe-4'>
					Izaberi knjizaru ili biblioteku{' '}
				</label>
				<select
					className='no-print'
					onChange={bookstoreShow}
					id='bookstore'
					name='bookstore'>
					<option value=''>Knjizare:</option>
					<option value='vulkan'>Knjizare Vulkan</option>
					<option value='beopolis'>Knjizare Beopolis</option>
					<option value='delfi'>Knjizare Delfi</option>
					<option value='bibiloteka'>Bibiloteka</option>
				</select>

				{/* Prikazivanje informacija samo kada je izabrana knjižara */}
				{selectedBookstore && selectedBookstore !== 'bibiloteka' && (
					<div className='knjizara-name border border-black'>
						{bookstores[selectedBookstore].map((store) => (
							<div className='d-flex justify-content-around' key={store.id}>
								<div>
									<p>{store.name}</p>
									<p>{store.address}</p>
									<p>
										{store.MB
											? `Matični broj: ${store.MB}`
											: 'Matični broj: N/A'}
									</p>
								</div>
								<div>
									<p>PIB: {store.PIB}</p>
									<p>Email: {store.email}</p>
									<p>Telefon: {store.phone}</p>
								</div>
							</div>
						))}
					</div>
				)}

				{selectedBookstore === 'bibiloteka' && (
					<div className='border border-black p-3 mt-3'>
						<label className='pe-4 mb-3' htmlFor='bibilotekaName'>
							Naziv:
						</label>
						<input
							type='text'
							id='bibilotekaName'
							name='name'
							value={bibilotekaInfo.name}
							onChange={handleBibilotekaChange}
						/>
						<br />
						<label className='pe-4' htmlFor='bibilotekaAddress'>
							Mesto:
						</label>
						<input
							type='text'
							id='bibilotekaAddress'
							name='address'
							value={bibilotekaInfo.address}
							onChange={handleBibilotekaChange}
						/>
						<br />
					</div>
				)}
			</div>

			{selectedBookstore && (
				<div>
					<Books
						isBibilotekaSelected={selectedBookstore === 'bibiloteka'}
						selectedBookstore={selectedBookstore}
						rows={rows}
						setRows={setRows}
					/>

					{/* Only show this section when selectedBookstore is NOT 'bibiloteka' */}
					{selectedBookstore !== 'bibiloteka' && (
						<div className='text-center bez-pecata-i-potpisa-div'>
							<h3>Otpremnica je punovažna bez pečata i potpisa</h3>
							<h3 class='mb-5'>Odgovorno lice: Nađa Parandilović</h3>
							<div className='row'>
								<div className='col-6'>
									<h5>
										Mesto:
										<br />
										<br />
										Beograd
									</h5>
								</div>
								<div className='col-6'>
									<h5>
										Primio:
										<br />
										<br />
										____________________________
									</h5>
								</div>
							</div>
						</div>
					)}
				</div>
			)}
		</section>
	);
}

export default FormGenerator;
