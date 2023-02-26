<style>
				.form,
				.single-article {
								display: flex;
								gap: 10px
				}

				.single-article {
								margin: 10px
				}

				.article-title {
								font-size: 24px;
								font-weight: 600
				}

				p {
								font-size: 18px;
								font-weight: 500
				}

				.search-place {
								position: relative;
								margin-top: 20px
				}

				button {
								border: none;
								background: 0 0
				}

				.submit {
								margin-top: 10px;
								font-size: 24px
				}

				@media(max-width:700px) {
								.single-article {
												display: flex;
												flex-direction: column;
												gap: 10px;
												margin-bottom: 15px
								}

								.image-section img {
												width: 100%;
                                                height: 300px;
								}
				}
                .summary{
                    display: -webkit-box;
                    -webkit-line-clamp: 5;
                    overflow: hidden;
                    -webkit-box-orient: vertical;
                }
                .image-section img {
                                                height: 200px;
                                                border-radius: 20px;
                                                object-fit: cover;
                                                object-position: top;

								}
</style>
