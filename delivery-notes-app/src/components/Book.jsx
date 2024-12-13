import React, { useState } from 'react';
import books from '../books';

function Books({ isBibilotekaSelected, selectedBookstore }) {
	const [rows, setRows] = useState([
		{ name: '', barCode: '', cena: 0, rabat: 0, cenaSaRabatom: 0, kolicina: 1 },
	]);

	function getBooks(event, index) {
		const selectedBookValue = event.target.value;

		if (books[selectedBookValue]) {
			const selectedBookData = books[selectedBookValue][0];

			let rabat = 0;
			let cenaSaRabatom = selectedBookData.cena;

			if (selectedBookstore === 'vulkan' || selectedBookstore === 'delfi') {
				rabat = selectedBookData.cena * 0.5;
			} else if (selectedBookstore === 'beopolis') {
				rabat = selectedBookData.cena * 0.3;
			}

			cenaSaRabatom = selectedBookData.cena - rabat;

			setRows((prevRows) => {
				const newRows = [...prevRows];
				newRows[index] = {
					name: selectedBookData.name,
					barCode: selectedBookData.barCode,
					cena: selectedBookData.cena,
					rabat: rabat,
					cenaSaRabatom: cenaSaRabatom,
					kolicina: newRows[index].kolicina,
				};
				return newRows;
			});
		} else {
			setRows((prevRows) => {
				const newRows = [...prevRows];
				newRows[index] = {
					name: '',
					barCode: '',
					cena: 0,
					rabat: 0,
					cenaSaRabatom: 0,
					kolicina: 1,
				};
				return newRows;
			});
		}
	}

	function updateKolicina(index, value) {
		const newKolicina = parseInt(value, 10) || 1;

		setRows((prevRows) => {
			const newRows = [...prevRows];
			const currentRow = newRows[index];

			const ukupnaCena = currentRow.cena * newKolicina;
			const ukupniRabat = currentRow.rabat * newKolicina;
			const cenaSaRabatom = ukupnaCena - ukupniRabat;

			newRows[index] = {
				...currentRow,
				kolicina: newKolicina,
				cenaSaRabatom,
			};

			return newRows;
		});
	}

	function addBook() {
		setRows((prevRows) => [
			...prevRows,
			{
				barCode: '',
				cena: 0,
				rabat: 0,
				cenaSaRabatom: 0,
				kolicina: 1,
			},
		]);
	}

	function deleteBook(index) {
		setRows((prevRows) => prevRows.filter((_, i) => i !== index)); // This removes the specific row
	}

	return (
		<div className='container d-flex flex-column book-class mt-5'>
			{selectedBookstore && rows.length > 0 && (
				<>
					<table id='table'>
						<thead>
							<tr>
								<th>R.B</th>
								<th>Naziv</th>
								<th></th>
								<th>Bar-kod</th>
								<th>j.m</th>
								<th>kol</th>
								{!isBibilotekaSelected && (
									<>
										<th>cena</th>
										<th>Rabat</th>
										<th>Iznos bez PDV-a</th>
									</>
								)}
								<th></th> {/* New column for action buttons */}
							</tr>
						</thead>
						<tbody>
							{rows.map((row, index) => (
								<tr key={index}>
									<td>{index + 1}</td>
									<td>
										<select
											onChange={(e) => getBooks(e, index)}
											id='bookstore'
											name='bookstore'>
											<option value=''>Izaberi knjigu</option>
											<option value='kvartida'>Kvartida</option>
											<option value='nartiJedan'>Narti 1</option>
											<option value='zlatniCup'>Zlatni cup</option>
											<option value='najplavljeOko'>Najplavlje oko</option>
											<option value='anaSvard'>Ana Svard</option>
											<option value='dnevnikUOsam'>Dnevnik u osam</option>
											<option value='krvaveLatice'>Krvave latice</option>
											<option value='slPutVatra'>Sledeći put vatra</option>
											<option value='zene'>Žene</option>
											<option value='narti2'>Narti 2</option>
											<option value='kineskiSan'>Kineski san</option>
											<option value='kastanka'>Kaštanka</option>
											<option value='kvartida'>Kvartida</option>
											<option value='nepuporedivaZemlja'>
												Neuporediva zemlja
											</option>
											<option value='kokain'>Kokain</option>
											<option value='odapetaStrela'>Odapeta strela</option>
											<option value='gospodePomiluj'>Gospode, pomiluj</option>
											<option value='teskeLjubavi'>Teške ljubavi</option>
											<option value='kosmarnik'>Košmarnik</option>
											<option value='tragac'>Tragac</option>
											<option value='potrosackoDrustvo'>
												Potrošačko društvo
											</option>
											<option value='svetKojiNestaje'>Svet koji nestaje</option>
											<option value='protivInterpretacije'>
												Protiv interpretacije
											</option>
											<option value='lala'>Lala</option>
											<option value='staVidimo'>Šta vidimo kada čitamo</option>
											<option value='sestra'>Sestra</option>
											<option value='devojkeURatu'>
												Devojke u ratu i druge priče
											</option>
											<option value='nevidljivi'>Nevidljivi</option>
											<option value='dogodiloSe'>Dogodilo Se</option>
											<option value='eleni'>Eleni, ili niko</option>
										</select>
									</td>
									<td></td>
									<td>{row.barCode}</td>
									<td>Kom</td>
									<td>
										<input
											type='number'
											min='1'
											value={row.kolicina}
											onChange={(e) => updateKolicina(index, e.target.value)}
										/>
									</td>

									{!isBibilotekaSelected && (
										<>
											<td>{row.cena.toFixed(2)}</td>
											<td>{row.rabat.toFixed(2)}</td>
											<td>{row.cenaSaRabatom.toFixed(2)}</td>
										</>
									)}
									{/* Only show the delete button on the last row */}
									<td>
										{index === rows.length - 1 && (
											<button
												className='no-print'
												onClick={() => deleteBook(index)}>
												Izbriši
											</button>
										)}
										{/* Delete button */}
									</td>
								</tr>
							))}
						</tbody>
					</table>
					<button
						className='dodaj-knjigu-dugme mt-4 mb-5 no-print'
						onClick={addBook}>
						Dodaj knjigu
					</button>
					{isBibilotekaSelected && (
						<div className='row text-center mt-5'>
							<div className='col-12 col-md-6'>
								<h4 className='mb-5'>Izdao :</h4>
								<p>______________________________________________</p>
							</div>
							<div className='col-12 col-md-6'>
								<h4 className='mb-5'>Primio :</h4>
								<p>______________________________________________</p>
							</div>
						</div>
					)}
				</>
			)}
		</div>
	);
}

export default Books;
